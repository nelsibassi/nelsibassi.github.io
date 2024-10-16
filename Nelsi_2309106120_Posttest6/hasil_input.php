<?php
session_start();


$pelangganData = isset($_SESSION['pelangganData']) ? $_SESSION['pelangganData'] : [];


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $idToDelete = (int)$_GET['id'];
    if (isset($pelangganData[$idToDelete])) {
        unset($pelangganData[$idToDelete]); 
        $_SESSION['pelangganData'] = array_values($pelangganData); 
    }
}


if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $idToEdit = (int)$_GET['id'];
    
    $_SESSION['editPelangganId'] = $idToEdit;
    header("Location: edit_form.php"); 
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hasil Input - Toko Pakaian</title>
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
        <h3 class="text-center">Hasil Input</h3>
        
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Nomor Telepon</th>
                    <th>Ukuran</th>
                    <th>File</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pelangganData)): ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada order yang dibuat.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pelangganData as $index => $pelanggan): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($pelanggan['name']) ?></td>
                            <td><?= htmlspecialchars($pelanggan['email']) ?></td>
                            <td><?= htmlspecialchars($pelanggan['tanggal_lahir']) ?></td>
                            <td><?= htmlspecialchars($pelanggan['phone']) ?></td>
                            <td><?= htmlspecialchars($pelanggan['ukuran']) ?></td>
                            <td>
                                <?php if (isset($pelanggan['file']) && !empty($pelanggan['file'])): ?>
                                    <img src="<?= htmlspecialchars($pelanggan['file']) ?>" alt="Gambar" class="img-thumbnail" />
                                <?php else: ?>
                                    Tidak ada file
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?action=edit&id=<?= $index ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?action=delete&id=<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="container text-center">
            <p>&copy; 2024 Toko Pakaian. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
