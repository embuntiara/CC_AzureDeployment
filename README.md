# Panduan Menjalankan Aplikasi

Berikut adalah langkah-langkah untuk menjalankan aplikasi ini:

## 1. Persiapan Database
Aplikasi ini membutuhkan database MySQL. Pastikan Anda memiliki MySQL server yang berjalan (contohnya menggunakan XAMPP, WAMP, atau Laragon).

1.  Buka **phpMyAdmin** (biasanya di `http://localhost/phpmyadmin`) atau gunakan tool database client lainnya (seperti DBeaver, HeidiSQL).
2.  Buat database baru dengan nama `crud_db` (jika belum ada).
    *   *Alternatif:* Import file `dbAzure.sql` yang sudah disediakan. File ini akan otomatis membuat database dan tabel yang diperlukan.
3.  Pastikan konfigurasi di `db.php` sesuai dengan settingan MySQL Anda:
    ```php
    $host = '127.0.0.1';
    $dbname = 'crud_db';
    $username = 'root';
    $password = ''; // Kosongkan jika menggunakan default XAMPP
    ```

## 2. Menjalankan Aplikasi
Anda bisa menjalankan aplikasi ini menggunakan **PHP Built-in Server** tanpa perlu memindahkan folder ke `htdocs`.

1.  Buka terminal (Command Prompt atau PowerShell) di folder proyek ini.
2.  Jalankan perintah berikut:
    ```bash
    php -S localhost:8000
    ```
3.  Buka browser dan akses: [http://localhost:8000](http://localhost:8000)

## Catatan
- Jika Anda menggunakan XAMPP, pastikan module **Apache** dan **MySQL** sudah di-start di XAMPP Control Panel.
- Jika ingin menggunakan Apache XAMPP secara langsung, pindahkan folder proyek ini ke dalam folder `C:\xampp\htdocs\`, lalu akses melalui `http://localhost/nama_folder`.
