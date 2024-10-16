<?php
session_start();


$pelangganToEditId = isset($_SESSION['editPelangganId']) ? $_SESSION['editPelangganId'] : null;
$pelangganData = isset($_SESSION['pelangganData']) ? $_SESSION['pelangganData'] : [];

if ($pelangganToEditId !== null && isset($pelangganData[$pelangganToEditId])) {
    $pelangganToEdit = $pelangganData[$pelangganToEditId];
} else {
    
    header("Location: hasil_input.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'tanggal_lahir' => $_POST['tanggal_lahir'],
        'phone' => $_POST['phone'],
        'ukuran' => $_POST['ukuran'],
        'file' => $_POST['file'] 
    ];

   
    $pelangganData[$pelangganToEditId] = $updatedData;
    $_SESSION['pelangganData'] = $pelangganData;

    
    unset($_SESSION['editPelangganId']);
    
    
    header("Location: hasil_input.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit - Toko Pakaian</title>
    <style>
        body {
             background-color: #000; color: #fff;
             background-image: url(Gambar.jpg); 
        }
        .container { background-color: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 0.5rem; }
        .img-thumbnail { max-width: 100px; max-height: 100px; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Edit</h3>
        
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($pelangganToEdit['name'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($pelangganToEdit['email'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($pelangganToEdit['tanggal_lahir'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($pelangganToEdit['phone'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= htmlspecialchars($pelangganToEdit['ukuran'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="text" class="form-control" id="file" name="file" value="<?= htmlspecialchars($pelangganToEdit['file'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
