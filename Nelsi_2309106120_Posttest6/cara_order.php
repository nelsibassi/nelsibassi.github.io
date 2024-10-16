<?php
session_start();


if (!isset($_SESSION['pelangganData'])) {
    $_SESSION['pelangganData'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDirectory = 'uploads/';
    $filePath = '';

    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['fileUpload'];
        $timestamp = date('Y-m-d H.i.s'); 
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $uploadDirectory . $timestamp . '.' . $fileExtension;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
           
            $_SESSION['pelangganData'][] = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $_POST['password'], 
                'alamat' => $_POST['alamat'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'jumlah' => $_POST['jumlah'],
                'ukuran' => $_POST['ukuran'],
                'file' => $filePath 
            ];
        } else {
            echo "<div class='alert alert-danger'>File upload failed!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Please upload a valid file.</div>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cara Order - Toko Pakaian</title>
    <style>
        body { 
            background-color: #000; color: #fff; 
            background-image: url(Gambar.jpg); 
        }
        .container { background-color: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 0.5rem; }
        input, select { background-color: #333; color: #fff; border: 1px solid #fff; }
       
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Form Order Produk</h3>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>

            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran</label>
                <select id="ukuran" class="form-select" name="ukuran" required>
                    <option value="" disabled selected>Pilih ukuran</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fileUpload" class="form-label">Upload produk</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <footer>
        <div class="container text-center">
            <p>&copy; 2024 Toko Pakaian. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
