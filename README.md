# API MLSTouch

API REST 24/7 hébergée gratuitement. Stack : FastAPI + Uvicorn.

## Option 1 : Fly.io (gratuit, Docker)
1. Installer le CLI Fly : https://fly.io/docs/hands-on/install-flyctl/
2. Authentification : `fly auth signup` ou `fly auth login`
3. (Une seule fois) Créer l’app : `fly launch --no-deploy --copy-config --region iad --name api-mlstouch`
   - Confirme l’utilisation du Dockerfile existant.
4. Déployer manuellement : `fly deploy --remote-only`
5. CI/CD : ajouter un secret GitHub `FLY_API_TOKEN` (clé Fly) puis pousser sur `main` déclenche `.github/workflows/deploy-fly.yml`.

## Option 2 : Render (déjà préparé, mais facultatif)
- Build : `pip install -r requirements.txt`
- Start : `uvicorn main:app --host=0.0.0.0 --port=10000`
- Env var : `PORT=10000`
- Webhook : remplacer l’URL fictive dans `.github/workflows/deploy.yml` par celui généré dans Render (si tu veux garder Render).

## Dépannage installation (erreur proxy/403 PyPI)
Si `pip install -r requirements.txt` échoue à cause d’un proxy (403 Forbidden), teste l’un de ces contournements :
- Forcer l’index : `PIP_INDEX_URL=https://pypi.org/simple pip install -r requirements.txt`
- Ajouter un index miroir : `PIP_EXTRA_INDEX_URL=https://pypi.python.org/simple pip install -r requirements.txt`
- Si l’accès sortant est totalement bloqué, installe FastAPI et Uvicorn depuis un poste avec internet, exporte le dossier `.venv` ou un wheelhouse, puis copie-le avant de déployer.
