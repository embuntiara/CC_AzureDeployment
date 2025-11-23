<?php
// PASTIKAN FILE BaltimoreCyberTrustRoot.crt.pem ADA DI ROOT PROJECT
$ssl_ca = 'BaltimoreCyberTrustRoot.crt.pem';

// 1. Ambil Variabel Lingkungan dari Azure App Settings
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER'); // Defaultnya $DB_ADMIN@$MYSQL_SERVER
$password = getenv('DB_PASSWORD');

// Jika salah satu variabel kosong, hentikan eksekusi
if (!$host || !$dbname || !$username || !$password) {
    die("Connection failed: Missing one or more required environment variables (DB_HOST, DB_NAME, DB_USER, DB_PASSWORD).");
}

// 2. Lakukan Koneksi PDO dengan SSL
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;sslmode=required;sslca=$ssl_ca", // sslmode=required dan sslca=$ssl_ca wajib untuk Azure
        $username,
        $password
    );
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opsional: Cek koneksi berhasil
    // echo "Connection to Azure MySQL successful!";

} catch (PDOException $e) {
    // Error Connection refused biasanya disebabkan oleh masalah SSL/Firewall/Host.
    die("Connection failed: " . $e->getMessage());
}
?>