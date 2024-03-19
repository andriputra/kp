<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $testimoni = $_POST['testimoni'];

    // Query untuk menyimpan data testimonial ke database
    $query = "INSERT INTO testimonial (nama, testimoni) VALUES (?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $nama, $testimoni);

    // Eksekusi query
    if ($stmt->execute()) {
        header("Location: ../testimonial.php?status=success");
        exit();
    } else {
        header("Location: ../testimonial.php?status=error");
        exit();
    }
} else {
    // Jika form tidak disubmit, redirect ke halaman utama
    header("Location: ../testimonial.php");
    exit();
}
?>
