<?php
session_start();
require 'database.php'; // Pastikan file ini ada untuk koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    // Ambil data user dari database menggunakan prepared statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // Cek apakah user ada dan password sesuai
    if ($user && password_verify($password, $user['password'])) {
        // Set session dan redirect ke halaman utama
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>