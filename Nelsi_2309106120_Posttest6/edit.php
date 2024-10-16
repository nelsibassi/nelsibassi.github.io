<?php
session_start();

// Fetch the data to be edited
$pelangganToEditId = isset($_SESSION['editPelangganId']) ? $_SESSION['editPelangganId'] : null;
$pelangganData = isset($_SESSION['pelangganData']) ? $_SESSION['pelangganData'] : [];

if ($pelangganToEditId !== null && isset($pelangganData[$pelangganToEditId])) {
    $pelangganToEdit = $pelangganData[$pelangganToEditId];
} else {
    // Redirect back if no valid data is found to edit
    header("Location: hasil_input.php");
    exit;
}

// If the form is submitted, update the session data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data
    $updatedData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'tanggal_lahir' => $_POST['tanggal_lahir'],
        'phone' => $_POST['phone'],
        'ukuran' => $_POST['ukuran'],
        'file' => $_POST['file'] // You may want to handle file uploads separately
    ];

    // Update the data in the session
    $pelangganData[$pelangganToEditId] = $updatedData;
    $_SESSION['pelangganData'] = $pelangganData;

    // Clear the edit session
    unset($_SESSION['editPelangganId']);
    
    // Redirect back to the result page
    header("Location: data order.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Pelanggan - Toko Pakaian</title>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Edit Pelanggan</h3>
        
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
