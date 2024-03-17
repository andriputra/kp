<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengatur direktori upload
    $target_dir = "../../assets/img/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar valid
    if (isset($_FILES["gambar"]["name"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Batasi ukuran file
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Hanya izinkan format gambar tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Periksa jika $uploadOk adalah 0
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Jika semuanya baik, coba upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.";
            // Simpan informasi gambar ke database
            $query = "INSERT INTO fasilitas_pelatihan (nama_fasilitas, gambar) VALUES (?, ?)";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, "ss", $_POST['nama_fasilitas'], $_FILES["gambar"]["name"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            // Arahkan ke halaman index.php
            header("Location: ../index.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
