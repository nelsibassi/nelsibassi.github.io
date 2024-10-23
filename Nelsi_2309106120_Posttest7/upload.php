<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload File</h2>

        <!-- Form upload file -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Choose file to upload</label>
                <input class="form-control" type="file" name="file" id="file" required>
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Upload</button>
        </form>

        <?php
        if (isset($_POST['upload'])) {
            // Maximum file size in bytes (2MB)
            $maxFileSize = 2 * 1024 * 1024;
            $uploadDirectory = 'uploads/';

            // Check if uploads folder exists, if not create it
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            // Check if file is uploaded
            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $fileSize = $file['size'];
                $fileTmp = $file['tmp_name'];
                $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                // Validate file size
                if ($fileSize > $maxFileSize) {
                    echo "<div class='alert alert-danger mt-3'>File size exceeds the maximum limit of 2MB.</div>";
                } else {
                    // Get current timestamp and format as yyyy-mm-dd hh.mm.ss
                    $timestamp = date("Y-m-d H.i.s");
                    $newFileName = $timestamp . '.' . $fileExtension;

                    // Move uploaded file to uploads folder
                    if (move_uploaded_file($fileTmp, $uploadDirectory . $newFileName)) {
                        echo "<div class='alert alert-success mt-3'>File uploaded successfully: $newFileName</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Failed to upload file.</div>";
                    }
                }
            } else {
                echo "<div class='alert alert-danger mt-3'>No file uploaded.</div>";
            }
        }
        ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
