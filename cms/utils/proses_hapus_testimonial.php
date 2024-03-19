<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Memeriksa apakah data testimonial ID dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testimonial_id'])) {
    // Mengambil testimonial ID dari data yang diterima
    $testimonial_id = $_POST['testimonial_id'];

    // Query untuk menghapus testimonial berdasarkan ID
    $query = "DELETE FROM testimonial WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $testimonial_id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika penghapusan berhasil, redirect ke halaman editor testimonial dengan status berhasil
        header("Location: ../testimonial.php?status=success");
        exit();
    } else {
        // Jika terjadi kesalahan, redirect ke halaman editor testimonial dengan status error
        header("Location: ../testimonial.php?status=error");
        exit();
    }
} else {
    // Jika testimonial ID tidak ditemukan dalam data POST, redirect ke halaman editor testimonial
    header("Location: ../testimonial.php");
    exit();
}
?>
