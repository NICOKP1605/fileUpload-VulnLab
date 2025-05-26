<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $targetFile = $targetDir . $fileName;

    // Cek apakah file sudah ada, jika ya, buat nama unik
    $counter = 1;
    while (file_exists($targetFile)) {
        $targetFile = $targetDir . pathinfo($fileName, PATHINFO_FILENAME) . "_$counter." . $fileType;
        $counter++;
    }

    // Pindahkan file yang diupload ke folder uploads
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error&type=upload");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
