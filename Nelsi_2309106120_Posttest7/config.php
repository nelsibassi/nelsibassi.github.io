<?php
$host = 'localhost';
$db   = 'user_management';  // Ganti dengan nama database kalian
$user = 'root';             // Ganti dengan username database kalian
$pass = '';                 // Ganti dengan password database kalian

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database</title>
    <style>
        body {
            background-image: url(gambar.jpg); 
            font-family: Arial, sans-serif; /* Mengatur font */
            margin: 0; /* Menghapus margin */
            padding: 20px; /* Menambahkan padding */
        }

        h1 {
            color: #333; /* Warna teks judul */
            text-align: center; /* Meratakan teks judul ke tengah */
        }

        form {
            background-color: white; /* Latar belakang putih untuk form */
            padding: 20px; /* Menambahkan padding pada form */
            border-radius: 8px; /* Sudut melengkung */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
            max-width: 400px; /* Lebar maksimum form */
            margin: 20px auto; /* Margin untuk meratakan form */
        }

        input[type="text"], input[type="password"] {
            padding: 10px; /* Menambahkan padding pada input */
            border: 1px solid #ccc; /* Border abu-abu */
            border-radius: 4px; /* Sudut melengkung */
            margin-bottom: 10px; /* Margin bawah untuk jarak antar input */
            width: 100%; /* Lebar penuh */
        }

        button {
            padding: 10px; /* Menambahkan padding pada button */
            background-color: #4CAF50; /* Warna latar belakang hijau */
            color: white; /* Warna teks putih */
            border: none; /* Menghapus border */
            border-radius: 4px; /* Sudut melengkung */
            cursor: pointer; /* Mengubah kursor menjadi pointer */
            width: 100%; /* Lebar penuh */
        }

        button:hover {
            background-color: #45a049; /* Warna latar belakang saat hover */
        }
    </style>
</head>
<body>
</body>
</html>
