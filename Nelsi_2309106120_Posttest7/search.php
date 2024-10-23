<?php
session_start();
include 'config.php'; // Pastikan file ini memiliki parameter koneksi yang benar

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah tabel inventory ada
$result = $conn->query("SHOW TABLES LIKE 'inventory'");
if ($result->num_rows == 0) {
    die("Tabel inventory tidak ada.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Inventory</title>
    <style>
        body {
            background-color: #f0f0f0; /* Latar belakang abu-abu muda */
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

        input[type="text"] {
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

        .results {
            margin-top: 20px; /* Margin atas untuk jarak hasil */
            background-color: white; /* Latar belakang putih untuk hasil */
            padding: 20px; /* Menambahkan padding pada hasil */
            border-radius: 8px; /* Sudut melengkung */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
        }
    </style>
</head>
<body>
    <h1>Pencarian Inventory</h1>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Cari produk..." required>
        <button type="submit">Cari</button>
    </form>

    <div class="results">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $searchTerm = $_POST['search']; // Dapatkan istilah pencarian dari form
            $stmt = $conn->prepare("SELECT * FROM inventory WHERE nama_barang LIKE ?");
            $searchTerm = "%$searchTerm%"; // Untuk pencocokan parsial
            $stmt->bind_param("s", $searchTerm);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Ambil dan tampilkan hasil
                    while ($row = $result->fetch_assoc()) {
                        echo "ID: " . $row['id'] . " - Nama: " . $row['nama_barang'] . " - Stok: " . $row['stok'] . " - Harga: " . $row['harga'] . "<br>";
                    }
                } else {
                    echo "Tidak ada hasil ditemukan.";
                }
            } else {
                echo "Error saat mengeksekusi query: " . $stmt->error;
            }
            
            $stmt->close();
        }
        ?>
    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>
