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

## Screenshot

<img width="1920" height="1080" alt="Screenshot (303)" src="https://github.com/user-attachments/assets/8ecf8c5d-d4d5-4d12-b9d2-a147c093028b" />
<img width="1920" height="1080" alt="Screenshot (308)" src="https://github.com/user-attachments/assets/3c6b00f7-cb14-4a73-808c-92d3e7080396" />
<img width="1920" height="1080" alt="Screenshot (307)" src="https://github.com/user-attachments/assets/933a5c9a-4e5f-46be-8774-0d842f25c5e3" />
<img width="1920" height="1080" alt="Screenshot (306)" src="https://github.com/user-attachments/assets/a13ffd98-82d8-437a-8cc6-8ecddd2c66eb" />
<img width="1920" height="1080" alt="Screenshot (305)" src="https://github.com/user-attachments/assets/4e21e377-9a4d-44ec-8a5d-830a65d09709" />
<img width="1920" height="1080" alt="Screenshot (304)" src="https://github.com/user-attachments/assets/371b1629-d764-4c46-a324-854c21600feb" />
<img width="1920" height="1080" alt="Screenshot (309)" src="https://github.com/user-attachments/assets/13460401-ad6a-4289-8692-9c608566fc44" />
<img width="1920" height="1080" alt="Screenshot (321)" src="https://github.com/user-attachments/assets/81a2eef6-2b74-4ce5-8c7b-e2a6ee72efb8" />
<img width="1920" height="1080" alt="Screenshot (320)" src="https://github.com/user-attachments/assets/3b19eb75-abf7-429f-882a-9945d1106737" />
<img width="1920" height="1080" alt="Screenshot (319)" src="https://github.com/user-attachments/assets/6479c9b2-56d6-4a53-9875-324e75728c48" />
<img width="1920" height="1080" alt="Screenshot (318)" src="https://github.com/user-attachments/assets/720f9dc7-f8d1-46c5-aa18-abc66130246f" />
<img width="1920" height="1080" alt="Screenshot (317)" src="https://github.com/user-attachments/assets/e51925e9-1d5d-4122-b09e-9995c4b14236" />
<img width="1920" height="1080" alt="Screenshot (316)" src="https://github.com/user-attachments/assets/a43423f5-616e-48da-8757-c4fd4ae1da1a" />
<img width="1920" height="1080" alt="Screenshot (315)" src="https://github.com/user-attachments/assets/07de4fbe-b830-42bb-990e-439e7defd3a1" />
<img width="1920" height="1080" alt="Screenshot (314)" src="https://github.com/user-attachments/assets/057d646a-a9c9-4c4a-a0a6-8ad13770747a" />
<img width="1920" height="1080" alt="Screenshot (313)" src="https://github.com/user-attachments/assets/f29842d9-f4ee-4fd6-a57e-e9376eda5f99" />
<img width="1920" height="1080" alt="Screenshot (323)" src="https://github.com/user-attachments/assets/1ba6a43a-d5ab-4ec7-89ce-91b10e107428" />
<img width="1920" height="1080" alt="Screenshot (322)" src="https://github.com/user-attachments/assets/64fee849-f7ad-4e0c-8553-455c6fe425e6" />



