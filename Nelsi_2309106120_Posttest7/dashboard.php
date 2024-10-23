<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect ke login jika belum login
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-image: url(gambar.jpg); 
            font-family: Arial, sans-serif; /* Mengatur font */
            margin: 0; /* Menghapus margin */
            padding: 20px; /* Menambahkan padding */
        }

        h1 {
            color: #333; /* Warna teks judul */
        }

        form {
            margin-top: 20px; /* Menambahkan margin atas pada form */
            display: flex; /* Mengatur layout flex untuk form */
            justify-content: center; /* Meratakan konten secara horizontal */
        }

        input[type="text"] {
            padding: 10px; /* Menambahkan padding pada input */
            border: 1px solid #ccc; /* Border abu-abu */
            border-radius: 4px; /* Sudut melengkung */
            margin-right: 10px; /* Margin kanan antara input dan button */
            flex: 1; /* Membuat input mengisi ruang yang tersedia */
        }

        button {
            padding: 10px 15px; /* Menambahkan padding pada button */
            background-color: #4CAF50; /* Warna latar belakang hijau */
            color: white; /* Warna teks putih */
            border: none; /* Menghapus border */
            border-radius: 4px; /* Sudut melengkung */
            cursor: pointer; /* Mengubah kursor menjadi pointer */
        }

        button:hover {
            background-color: #45a049; /* Warna latar belakang saat hover */
        }

        a {
            display: inline-block; /* Menampilkan link sebagai blok */
            margin-top: 10px; /* Margin atas untuk link */
            color: #007BFF; /* Warna teks link */
            text-decoration: none; /* Menghapus garis bawah pada link */
        }

        a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }
    </style>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
    <h2>Cari Produk</h2>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Cari..." required>
        <button type="submit">Cari</button>
    </form>
</body>
</html>
