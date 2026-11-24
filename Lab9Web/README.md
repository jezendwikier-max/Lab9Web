# Lab9Web - Praktikum 9: PHP Modular

Repository tugas Praktikum Pemrograman Web 9 (Modularisasi Program, Function, Template, dan Routing).

- Nama : Jezen Dwiki Erlangga
- NIM  : 312510106
- Kelas: I252A

## Tujuan Project

Memisahkan aplikasi PHP ke dalam file-file yang memiliki tanggung jawab jelas: template bersama (header/footer), function helper, konfigurasi database, modul fitur, dan router berbasis parameter URL dengan whitelist rute.

## Kebutuhan Perangkat

- Web server lokal (XAMPP / Laragon) dengan Apache, PHP 8.0+ dan MySQL/MariaDB
- Browser
- Visual Studio Code
- Git

## Cara Menjalankan

1. Buat folder `Lab9Web` ke docroot (`htdocs` pada XAMPP atau `www` pada Laragon).
2. Nyalakan Apache dan MySQL.
3. Import `project/database.sql` melalui phpMyAdmin (database `db_latihan`).
4. Sesuaikan kredensial database pada `project/config/database.php` jika perlu.
5. Buka di browser:
   - Latihan 1: `http://localhost/Lab9Web/01_include_require/uji-include.php`
   - Latihan 2: `http://localhost/Lab9Web/02_template/home.php`
   - Latihan 3: `http://localhost/Lab9Web/03_function/latihan-1.php`
   - Aplikasi utama: `http://localhost/Lab9Web/project/index.php`
6. Login aplikasi utama: username `admin`, password `admin123`.

## Struktur Direktori

```
Lab9Web/
├── README.md
├── 01_include_require/
│   ├── pesan.php
│   ├── uji-include.php
│   └── uji-require.php
├── 02_template/
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── about.php
│   ├── profil.php
│   ├── kontak.php
│   └── style.css
├── 03_function/
│   ├── helpers.php
│   ├── latihan-1.php
│   └── latihan-2.php
└── project/
    ├── index.php            (router / titik masuk)
    ├── .htaccess            (URL rewrite, opsional)
    ├── database.sql
    ├── config/
    │   └── database.php
    ├── views/
    │   ├── header.php
    │   ├── footer.php
    │   ├── dashboard.php
    │   └── 404.php
    ├── helpers/
    │   └── functions.php
    ├── modules/
    │   ├── user/  (list, add, edit, delete)
    │   └── auth/  (login, logout)
    └── assets/
        ├── css/style.css
        └── js/app.js
```

## Daftar Rute

| Parameter `page` | File                          | Keterangan                    |
|------------------|-------------------------------|-------------------------------|
| `dashboard`      | `views/dashboard.php`         | Halaman utama (wajib login)   |
| `user/list`      | `modules/user/list.php`       | Daftar pengguna               |
| `user/add`       | `modules/user/add.php`        | Tambah pengguna               |
| `user/edit`      | `modules/user/edit.php`       | Ubah pengguna (`&id=...`)     |
| `user/delete`    | `modules/user/delete.php`     | Hapus pengguna (hanya POST)   |
| `login`          | `modules/auth/login.php`      | Login (publik)                |
| `logout`         | `modules/auth/logout.php`     | Logout                        |
| (lainnya)        | `views/404.php`               | Status HTTP 404               |

## Langkah Praktikum

1. Menguji `include` vs `require` pada folder `01_include_require`.
2. Membuat template (header, footer, 4 halaman) pada `02_template`.
3. Membuat function dan memindahkannya ke `helpers.php` pada `03_function`.
4. Menyusun struktur direktori modular pada `project/`.
5. Membuat router `index.php` dengan whitelist dan halaman 404.
6. Memindahkan koneksi database ke `config/database.php`.
7. Merefactor CRUD ke `modules/user/` dan menggunakan template bersama.
8. Tantangan: menu aktif, flash message, pembatasan akses login, dan `.htaccess`.

## Kendala dan Solusi

(Isi dengan kendala yang Anda temukan saat praktikum, misalnya CSS tidak tampil karena path aset, atau `mod_rewrite` belum aktif, beserta cara mengatasinya.)

## Screenshot

(Tempel screenshot struktur direktori, template, function, routing, dan hasil pengujian CRUD di sini.)
