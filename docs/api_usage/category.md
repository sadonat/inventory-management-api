# /category

## POST

membuat category baru

Request:

```json
{
  "name": "Category Name"
}
```

Response:

```json
{
  "status": "ok",
  "message": "Category successfully created!",
  "data": null
}
```

## GET /category/{id}?offset={offset}&limit={limit}

Metode ini mengambil semua user menggunakan paging jika {id} tidak didefinisikan, kamu bisa mengisi {offset} dan {limit} untuk mensetting paging. {offset} untuk darimana memulai paging, dan {limit} untuk dimana mengakhiri {paging}. Kalau kedua parameter ini tidak diisi secara default offset = 0, dan limit = 20, ini akan mengambil 20 kategori pertama dari database. Kalau {id} diisi ia akan mengambil sebuah kategori yang memilki id tersebut.

Response untuk url /category/{id}

```json
{
  "status": "ok",
  "message": "Successfuly find category",
  "data": {
    "id": 1,
    "name": "Category Name"
  }
}
```

Response untuk url /category?offset=0&limit=5

```json
{
  "status": "ok",
  "message": "Successfully find all categories",
  "data": [
    {
      "id": 3,
      "name": "Category Name"
    },
    {...},
    ...
  ]
}
```

## DELETE /category/{id}

Mebghaous sebuah kategori, ganti {id} dengan id kategori yang ingin kamu hapus

Request: -

Response:

```json
{
  "status": "ok",
  "message": "Category with id 1 is succesfully deleted",
  "data": null
}
```

## PUT /category/{id}

Mengupdate nama sebuah kategori, ganti {id} dengan id kategori yang ingin diubah namanya.

Request:

```json
{
  "name": "New Category Name"
}
```

Response:

```json
{
  "status": "ok",
  "message": "A category name successfulky updated",
  "data": null
}
```
