<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" required>
            <button type="submit" name="submit">Upload</button>
        </form>

        <h3>Daftar File yang Telah Diupload:</h3>
        <ul>
            <?php
            $files = glob("uploads/*");
            if (count($files) > 0) {
                foreach ($files as $file) {
                    echo "<li><a href='$file' target='_blank'>" . basename($file) . "</a></li>";
                }
            } else {
                echo "<li>Belum ada file yang diupload.</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
