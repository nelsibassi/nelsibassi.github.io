<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-image: url(gambar.jpg); 
            color: #fff;
        }
        .logout-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 26px;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Anda Telah Logout</h2>
        <p>Anda telah berhasil keluar dari akun. Klik di bawah untuk login kembali.</p>
        <a href="login.php">Login Lagi</a>
    </div>
</body>
</html>

<?php
exit();
?>
