<?php
// =============================================================
//  FORMULAIRE DE CONTACT - RE/MAX COMMERCIAL
//  Version SendGrid + pièce jointe (GeoJSON + carte PNG)
// =============================================================

$destinataire = "benoit@re-maxcommercial.ca";
$copie_cci    = "info@re-maxcommercial.ca";
$nom_expediteur = "Formulaire Re/Max Commercial";
$objet = "Nouvelle demande d'information – Re/Max Commercial";
$sendgrid_api_key = "";

// ------------------------------------------------
// Collecte des champs du formulaire
// ------------------------------------------------
$fields = ['name','company','email','phone','need','budget','sizeMin','sizeMax','desc','geometry'];
foreach ($fields as $f) { $$f = isset($_POST[$f]) ? trim($_POST[$f]) : ''; }
$assets = isset($_POST["asset"]) ? implode(", ", $_POST["asset"]) : 'Non spécifié';

// ------------------------------------------------
// Crée un fichier GeoJSON temporaire
// ------------------------------------------------
$geojson_filename = null;
if (!empty($geometry)) {
  $geojson_data = json_decode($geometry, true);
  if ($geojson_data) {
    $geojson_filename = sys_get_temp_dir() . '/zone_' . uniqid() . '.geojson';
    file_put_contents($geojson_filename, json_encode($geojson_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }
}

// ------------------------------------------------
// Génère une image statique de la zone (simple bbox)
// ------------------------------------------------
$map_image_path = null;
if (!empty($geojson_data['features'][0]['geometry']['coordinates'])) {
  $coords = $geojson_data['features'][0]['geometry']['coordinates'][0];
  $lats = array_column($coords, 1);
  $lngs = array_column($coords, 0);
  $lat_center = array_sum($lats) / count($lats);
  $lng_center = array_sum($lngs) / count($lngs);
  $zoom = 11;

  // URL d'une carte statique libre via OpenStreetMap Static (QuickChart)
  $map_url = "https://quickchart.io/map?c={type:'osm',center:[$lat_center,$lng_center],zoom:$zoom,markers:[{lat:$lat_center,lng:$lng_center}]}";
  $map_image_path = sys_get_temp_dir() . '/map_' . uniqid() . '.png';
  file_put_contents($map_image_path, file_get_contents($map_url));
}

// ------------------------------------------------
// Corps HTML du courriel
// ------------------------------------------------
$body = "
<html><body style='font-family:Arial,sans-serif;background:#f5f6fa;padding:30px;'>
<table align='center' width='650' style='background:#fff;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,0.15);'>
<tr><td style='background:#d32f2f;color:#fff;padding:18px 25px;font-size:20px;font-weight:bold;'>🏗️ Nouvelle demande d'information – Re/Max Commercial</td></tr>
<tr><td style='padding:25px;color:#333;line-height:1.6;font-size:15px;'>
<b>Nom :</b> {$name}<br>
<b>Entreprise :</b> {$company}<br>
<b>Courriel :</b> {$email}<br>
<b>Téléphone :</b> {$phone}<br><br>
<b>Type de besoin :</b> {$need}<br>
<b>Budget :</b> {$budget}<br>
<b>Superficie :</b> {$sizeMin} à {$sizeMax} pi²<br>
<b>Type d'actif :</b> {$assets}<br><br>
<b>Description :</b><br>{$desc}<br><br>";

if ($geojson_filename) {
  $body .= "<b>Zone dessinée (GeoJSON):</b><br><pre style='background:#f9f9f9;border:1px solid #ddd;padding:10px;border-radius:6px;'>"
        . htmlspecialchars(file_get_contents($geojson_filename)) . "</pre><br>";
}

if ($map_image_path) {
  $body .= "<b>Carte de la zone :</b><br><img src='cid:mapimage' style='max-width:100%;border-radius:8px;border:1px solid #ddd;'>";
}

$body .= "<hr><p style='font-size:13px;color:#777'>Message automatique envoyé depuis <b>re-maxcommercial.ca</b></p>
</td></tr></table></body></html>";

// ------------------------------------------------
// Construction du message SendGrid
// ------------------------------------------------
$attachments = [];
if ($geojson_filename) {
  $attachments[] = [
    "content" => base64_encode(file_get_contents($geojson_filename)),
    "type" => "application/geo+json",
    "filename" => basename($geojson_filename),
    "disposition" => "attachment"
  ];
}
if ($map_image_path) {
  $attachments[] = [
    "content" => base64_encode(file_get_contents($map_image_path)),
    "type" => "image/png",
    "filename" => "zone_carte.png",
    "disposition" => "inline",
    "content_id" => "mapimage"
  ];
}

$data = [
  "personalizations" => [[
    "to" => [["email" => $destinataire]],
    "bcc" => [["email" => $copie_cci]],
    "subject" => $objet
  ]],
  "from" => [
    "email" => "benoit@re-maxcommercial.ca",
    "name" => $nom_expediteur
  ],
  "reply_to" => [
    "email" => filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : "benoit@re-maxcommercial.ca",
    "name" => $name ?: "Visiteur"
  ],
  "content" => [[
    "type" => "text/html",
    "value" => $body
  ]],
  "attachments" => $attachments
];

// ------------------------------------------------
// Envoi via SendGrid
// ------------------------------------------------
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer {$sendgrid_api_key}",
  "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Nettoyage des fichiers temporaires
if ($geojson_filename && file_exists($geojson_filename)) unlink($geojson_filename);
if ($map_image_path && file_exists($map_image_path)) unlink($map_image_path);

// ------------------------------------------------
// Retour AJAX
// ------------------------------------------------
if ($httpcode == 202) echo "OK";
else echo "Mailer Error ($httpcode): " . htmlspecialchars($response);
?>
