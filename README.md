# Money Tracker

Money Tracker adalah aplikasi pengelolaan keuangan pribadi yang memungkinkan pengguna untuk melacak pemasukan dan pengeluaran mereka dengan mudah. Aplikasi ini dibangun menggunakan Laravel 8 dengan Jetstream untuk autentikasi dan UI dasar.

## Teknologi yang Digunakan

- **PHP 7.4+**
- **Laravel 8** - Framework PHP
- **Jetstream** - Starter kit untuk autentikasi dan UI
- **Livewire** - Framework full-stack untuk Laravel
- **MySQL/MariaDB** - Database
- **Tailwind CSS 3** - Framework CSS
- **Alpine.js** - Framework JavaScript minimal
- **Laravel Mix** - Asset compilation

## Fitur Utama

- Manajemen kategori (pemasukan/pengeluaran)
- Manajemen dompet (sumber dana)
- Pencatatan transaksi keuangan
- Konfigurasi periode laporan
- Autentikasi pengguna dengan Jetstream

## Panduan Instalasi

### Persyaratan Sistem

- PHP 7.4 atau lebih tinggi
- Composer
- Node.js dan NPM
- MySQL/MariaDB

### Langkah-langkah Instalasi

1. **Clone repositori**

   ```bash
   git clone <repository-url>
   cd money_tracker
   ```

2. **Instal dependensi PHP**

   ```bash
   composer install
   ```

3. **Instal dependensi JavaScript**

   ```bash
   npm install
   ```

4. **Salin file .env**

   ```bash
   cp .env.example .env
   ```

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi database**

   Buka file `.env` dan sesuaikan konfigurasi database:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=money_tracker
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Jalankan migrasi database**

   ```bash
   php artisan migrate
   ```

8. **Kompilasi asset**

   ```bash
   npm run dev
   ```

   Untuk production:

   ```bash
   npm run prod
   ```

9. **Jalankan server lokal**

   ```bash
   php artisan serve
   ```

   Aplikasi akan tersedia di `http://localhost:8000`

## Pengembangan

Untuk pengembangan, Anda dapat menggunakan perintah berikut:

```bash
npm run watch
```

Ini akan memantau perubahan pada file asset dan mengkompilasi ulang secara otomatis.

## Lisensi

Aplikasi ini dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).
