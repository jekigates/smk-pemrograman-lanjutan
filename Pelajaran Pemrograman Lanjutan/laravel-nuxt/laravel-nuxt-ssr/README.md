### Instalasi

Vue

```
> cd crud-api
> cd frontend-vue
> npm install
```

Laravel

```
> cd crud-api
> cd backend-laravel
> composer install
> cp .env.example .env
> php artisan migrate:fresh --seed
> php artisan key:generate
```

Pesan:
Jangan lupa buat database kosong dengan nama seperti folder yang mau diambil.

### Menjalankan Projek

Laravel

```
> php artisan serve
```

Vue

```
> npm run dev
```

Pesan:
Pastikan server backend-laravel dan server frontend-vue aktif keduanya, agar halaman web dan API-nya berjalan dengan baik.
