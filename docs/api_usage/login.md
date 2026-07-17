# /login

## POST

Dengan ini kamu akan mendapatkan token autorisasi.

Request:

```json
{
  "name": "Admin",
  "password": "admin12345"
}
```

Response:

```json
{
  "status": "ok",
  "data": {
    "message": "Token successfully created",
    "token": "tokenexampleonlyexample"
  }
}
```
