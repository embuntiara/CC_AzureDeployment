<?php
// PASTIKAN FILE DigiCertGlobalRootG2.crt.pem ADA DI ROOT PROJECT
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem';

// HARDCODE DULU BIAR JELAS
$host = 'web-server-crud.mysql.database.azure.com';
$dbname = 'crud_db';
$username = 'blmzqklfhg'; // <--- PAKE NAMA ANEH INI
$password = 'Rahasia2025'; // Pake password yang tadi lu reset

// Debugging: Cetak variabel biar yakin (HAPUS NANTI)
// echo "Mencoba konek ke: $host dengan user $username <br>";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;sslmode=required;sslca=$ssl_ca",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kalo sukses, diem aja atau echo dikit
    // echo "KONEKSI SUKSES BRE!";

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>