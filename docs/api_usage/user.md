# user
## GET /user/{id}?offset={offset}&limit={limit}

Metode ini mengambil semua user menggunakan paging jika {id} tidak didefinisikan, kamu bisa mengisi {offset} dan {limit} untuk mensetting paging. {offset} untuk darimana memulai paging, dan {limit} untuk dimana mengakhiri {paging}. Kalau kedua parameter ini tidak diisi secara default offset = 0, dan limit = 20, ini akan mengambil 20 user pertama dari database. Kalau {id} diisi ia akan mengambil sebuah useryang memilki id tersebut.

Response untuk url /user/{id}

```json
{
  "status": "ok",
  "data": {
    "id": 1,
    "name": "username",
    "password": "$2y$12$kPajNexWnC1NsMyQbRIWgez5ADkGyGqtuPPjg0MxsxYALJAdvDzwO",
    "role": "staff"
  }
}
```

Response untuk url /user?offset=0&limit=5

```json
{
  "status": "ok",
  "data": [
    {
      "id": 1,
      "name": "username",
      "password": "$2y$12$RpdRyBbmh5A88cazCYG8MutyQAzW4sSLPqJ9QaSNTQ/aSy2ASNlQK",
      "role": "staff"
    },
    {dan seterusnya}
  ]
}
```

## POST /user

Membuat akun user baru, harus terautorisasi degan level privilege 2, jadi pastikan untuk menggunakan token login.
Request:

```json
{
  "name": "username",
  "password": "userpassword",
  "role": "admin"
}
```

- role bersifat opsional, jika tidak diisi otomatis akan terisi dengan "staff".

Response:

```json
{
  "status": "ok",
  "data": {
    "message": "User successfully created"
  }
}
```

## PUT /user/{id}

Mengupdate sebuah user yang sudah ada. {id} diisi dengan id user yang ungin di update.

Request:

```json
{
  "name": "new user name",
  "password": "new user password"
}
```

Response:

```json
{
  "status": "ok",
  "data": {
    "message": "User successfully updated"
  }
}
```

## DELETE /user/{id}

menghapus user

Request: -

Response:

```json
{
  "status": "ok",
  "data": {
    "message": "User successfully deleted"
  }
}
```
