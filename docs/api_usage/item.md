# /item

## POST
membuat sebuah item baru.

Request:
```json
{
    "sku": "TI-1",
    "name": "Test item 1",
    "category_id": 1,
    "description": "Test item 1"
}
```
- sku harus unik dan tidak dapat di duplikasi, ia juga akn selalu dalam huruf kapital, meskipun kamu menginput huruf kecil.
- name akan selalu mengcapitalize huruf pertama dalam sebuah kata dan semua huruf dibelakangnya akan mwnjadi huruf kecil.
- category_id opsional untuk diisi namun jika mengisi pastikan ada categpry dengan id tersebut.
- deskripsi bersifat opsional
Response:
```json
{
  "status": "ok",
  "message": "Successfully created new item",
  "data": null
}
```
