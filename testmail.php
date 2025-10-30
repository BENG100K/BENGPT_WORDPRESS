<?php
$to = "benoit@patriciaetsonequipe.com";
$subject = "Test de mail() depuis le serveur";
$message = "Si tu reçois ceci, la fonction mail() fonctionne bien.";
$headers = "From: noreply@" . $_SERVER['SERVER_NAME'] . "\r\n";

if (mail($to, $subject, $message, $headers)) {
  echo "✅ Envoi réussi";
} else {
  echo "❌ Échec d’envoi";
}
?>
