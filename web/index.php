<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ourfiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container d-flex" style="width: fit-content;">
            <img src="images.jpg" alt="ourfiles logo" class="img-fluid" style="height: 40px;">
            <span class="navbar-brand ms-2 mb-0 h1">Ourfiles</span>
        </div>
    </nav>

    <div class="container mt-3">
        <?php if ($_GET['status'] == 'success'): ?>
            <div class="alert alert-success">✅ File berhasil diupload!</div>
        <?php elseif ($_GET['status'] == 'error'): ?>
            <div class="alert alert-danger">
                ❌ Terjadi kesalahan:
                <?php
                if ($_GET['type'] == 'invalid') {
                    echo "Format file tidak didukung!";
                } elseif ($_GET['type'] == 'size') {
                    echo "Ukuran file terlalu besar! Maksimal 5MB.";
                } else {
                    echo "Gagal mengupload file.";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow p-4">
                    <h2 class="text-center">Upload File</h2>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="file" name="fileToUpload" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center">Daftar File yang Telah Diupload</h3>
        <ul class="list-group mt-3">
            <?php
            $files = glob("uploads/*");
            if (count($files) > 0) {
                foreach ($files as $file) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    echo "<a href='$file' target='_blank'><i class='fas fa-file-alt me-2'></i> " . basename($file) . "</a>";
                    echo "<span class='badge bg-success'>Tersedia</span>";
                    echo "</li>";
                }
            } else {
                echo "<li class='list-group-item text-center'>Belum ada file yang diupload.</li>";
            }
            ?>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
