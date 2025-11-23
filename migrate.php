<?php
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem'; // Pastiin file ini ada

try {
    // Konek ke DB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;sslmode=required;sslca=$ssl_ca", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Bikin Tabel Users
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    echo "<h1>SUKSES! Tabel 'users' berhasil dibuat.</h1>";

} catch (PDOException $e) {
    die("<h1>Gagal Bro:</h1> " . $e->getMessage());
}
?>