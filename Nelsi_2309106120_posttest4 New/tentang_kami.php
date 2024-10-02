<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="tentang_kami.css"> 
    <title>Tentang Kami</title>
    <style>
        body {
            background-image: url(gambar.jpg); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            font-family: 'Poppins', sans-serif;
        }
        .about-section {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px; 
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center; 
            margin-top: 20px; 
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container" style="max-width: 900px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Toko Pakaian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="cara_order.php">Cara Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="tentang_kami.php">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="about-section">
            <h3>Tentang Kami</h3>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <img src="gambar toko.jpg" class="rounded-circle shadow-sm" alt="Logo Toko">
                </div>
                <div class="col-md-7 mt-3 mt-md-0">
                    <p class="lead">Toko Pakaian Online kami berdiri dengan misi untuk menyediakan produk-produk fashion berkualitas dengan harga terjangkau. Kami mengutamakan kenyamanan dan gaya yang sesuai dengan kebutuhan pelanggan kami.</p>
                    <p>Kami berkomitmen untuk terus menyediakan koleksi terbaru dan mengikuti tren global, sehingga Anda selalu bisa tampil percaya diri di setiap kesempatan. Terima kasih telah mempercayakan kami sebagai tempat belanja Anda!</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Toko Pakaian. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wgIkk21BEdRbE77uUTkcgVlgF7IrWTZvtdC1qyWsuiIGK8LZBYAImiuUc/lzmg9i" crossorigin="anonymous"></script>
</body>
</html>