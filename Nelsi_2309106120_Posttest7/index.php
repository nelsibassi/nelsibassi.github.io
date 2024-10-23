<?php
session_start();
include 'config.php';

$search_results = [];

if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['search_term']);
    $sql = "SELECT * FROM users WHERE username LIKE '%$search_term%'";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $search_results[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <form action="" method="POST" class="mb-4">
            <input type="text" name="search_term" placeholder="Search users..." class="form-control" required>
            <button type="submit" class="btn btn-primary mt-2" name="search">Search</button>
        </form>

        <?php if ($search_results): ?>
            <h4>Search Results:</h4>
            <ul class="list-group">
                <?php foreach ($search_results as $user): ?>
                    <li class="list-group-item"><?php echo htmlspecialchars($user['username']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
