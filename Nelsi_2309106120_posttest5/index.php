<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <title>Toko Pakaian Online</title>
    <style>
        body {
            background-image: url(gambar.jpg); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            font-family: 'Poppins', sans-serif; 
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 0.5rem; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }
        footer {
            text-align: center; 
            margin-top: 20px; 
            color: #fff;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-secondary">

    <div class="container border mb-4 mt-4 rounded-3 shadow" style="max-width: 900px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" onclick="showSection('home')">Toko Pakaian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('home')">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('about')">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('order')">Cara Order</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Home Section -->
        <div id="home">
            <div class="px-4 mb-4">
                <img src="gambar toko.jpg" class="w-100 rounded-3 shadow-sm store-image" alt="Gambar Toko">
            </div>

            <h3 class="text-center" id="produk-kami">Koleksi Produk</h3>
            <div class="text-center w-50 mx-auto fw-light mb-4">Temukan gaya yang mencerminkan diri Anda dengan koleksi pilihan kami!</div>

            <div class="row row-cols-1 row-cols-md-3 g-4 p-4">
                <?php
                $products = [
                    ['name' => 'Kaos nyaman dan stylish', 'image' => 'baju kaos.jpeg', 'price' => 'Rp. 85.000,00'],
                    ['name' => 'Kemeja elegan', 'image' => 'baju kemeja.jpeg', 'price' => 'Rp. 120.000,00'],
                    ['name' => 'Dress cantik', 'image' => 'baju dress.jpeg', 'price' => 'Rp. 150.000,00'],
                    ['name' => 'Hoodie nyaman', 'image' => 'baju hoodie.jpg', 'price' => 'Rp. 95.000,00'],
                    ['name' => 'Sweater hangat', 'image' => 'baju sweater.jpeg', 'price' => 'Rp. 110.000,00'],
                    ['name' => 'Blazer modis', 'image' => 'baju blazer.jpeg', 'price' => 'Rp. 130.000,00']
                ];

                foreach ($products as $product) {
                    echo '
                    <div class="col">
                        <div class="card shadow-lg h-100 border-0">
                            <div class="position-relative">
                                <img src="' . $product['image'] . '" class="card-img-top rounded-3 shadow-sm" alt="' . $product['name'] . '" style="max-height: 250px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-danger">New</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">' . $product['name'] . '</p>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                <span class="ms-auto text-danger fw-bold">' . $product['price'] . '</span>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>

        <!-- About Section -->
        <div id="about" class="hidden">
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

        <!-- Order Section -->
        <div id="order" class="hidden">
            <h3>Cara Order</h3>
            <ol>
                <li>Pilih produk yang Anda inginkan dari <a href="#produk-kami">Koleksi Produk</a>.</li>
                <li>Setelah memilih, klik tombol "Detail" untuk melihat informasi lebih lanjut tentang produk.</li>
                <li>Pilih ukuran dan jumlah produk yang Anda inginkan.</li>
                <li>Klik tombol "Beli" untuk menambah produk ke keranjang belanja Anda.</li>
                <li>Setelah selesai berbelanja, klik ikon keranjang untuk melihat dan menyelesaikan pemesanan.</li>
                <li>Ikuti instruksi untuk menyelesaikan pembayaran.</li>
            </ol>
            <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Toko Pakaian. All rights reserved.</p>
    </footer>

    <script>
        function showSection(section) {
            document.getElementById('home').classList.add('hidden');
            document.getElementById('about').classList.add('hidden');
            document.getElementById('order').classList.add('hidden');

            document.getElementById(section).classList.remove('hidden');
        }

        // Show home section by default
        showSection('home');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wgIkk21BEdRbE77uUTkcgVlgF7IrWTZvtdC1qyWsuiIGK8LZBYAImiuUc/lzmg9i" crossorigin="anonymous"></script>
</body>
</html>
