<?php
// Koneksi ke database
require_once "../../includes/config.php";

// Memeriksa apakah file gambar telah diunggah
if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    // Informasi file yang diunggah
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_size = $_FILES['gambar']['size'];
    $file_type = $_FILES['gambar']['type'];

    // Mendapatkan deskripsi dari formulir
    $deskripsi = $_POST['deskripsi'];

    // Menyimpan gambar ke direktori yang diinginkan di server
    $upload_dir = "../../assets/img/"; // Pastikan path sesuai dengan struktur folder Anda
    $target_file = $upload_dir . basename($file_name);

    if(move_uploaded_file($file_tmp, $target_file)) {
        // Menyimpan informasi gambar ke database
        $query = "INSERT INTO gambar_slider (nama, deskripsi, path) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query); // Menggunakan variabel $koneksi yang didefinisikan di config.php
        $stmt->bind_param("sss", $file_name, $deskripsi, $target_file);
        $stmt->execute();
        $stmt->close();

        // Redirect ke halaman input dengan pesan sukses
        header("Location: ../dashboard.php?status=success");
        exit();
    } else {
        // Redirect ke halaman input dengan pesan error jika ada masalah saat mengunggah file
        header("Location: ../dashboard.php?status=error");
        exit();
    }
} else {
    // Redirect ke halaman input dengan pesan error jika tidak ada file yang diunggah
    header("Location: ../dashboard.php?status=error");
    exit();
}
?>
