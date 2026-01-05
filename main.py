from fastapi import FastAPI

app = FastAPI()


@app.get("/")
def home():
    return {"status": "API MLSTouch en ligne 24/7 via Render"}
