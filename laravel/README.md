# smk-pemrograman-lanjutan

Tugas dan ulangan pelajaran Pemgoraman Lanjutan untuk murid kelas 12 jurusan TKJ di SMK Kristen Immanuel Pontianak.

### Instalasi

Untuk Windows

```
> cd akunt-api
> composer install
> cp .env.example .env
> php artisan migrate:fresh --seed
> php artisan key:generate
```

Note:
Don't forget to make empty database with name like the folder name you wanted to have.

### Menjalankan Projek

Untuk Windows

```
> php artisan serve
```
