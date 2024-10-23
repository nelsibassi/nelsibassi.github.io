<?php
// Konfigurasi database
$host = 'localhost';
$db   = 'user_management';  // Nama database
$user = 'root';             // Username MySQL Anda
$pass = '';                 // Password MySQL Anda
$charset = 'utf8mb4';

// Konfigurasi Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Membuat koneksi PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Menangani kesalahan koneksi
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
