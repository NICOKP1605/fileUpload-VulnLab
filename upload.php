<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Batasi ukuran file (maksimal 5MB)
    if ($_FILES["fileToUpload"]["size"] > 5 * 1024 * 1024) {
        die("Ukuran file terlalu besar (maksimal 5MB).");
    }

    // Cek apakah file sudah ada
    if (file_exists($targetFile)) {
        die("File sudah ada. Silakan upload file dengan nama berbeda.");
    }

    // Pindahkan file ke folder uploads/
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "File berhasil diupload: <a href='$targetFile' target='_blank'>$fileName</a>";
        echo "<br><a href='index.php'>Kembali</a>";
    } else {
        echo "Terjadi kesalahan saat mengupload file.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
