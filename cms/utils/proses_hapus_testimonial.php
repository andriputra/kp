<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah ID berita telah dikirim melalui parameter URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../testimonial.php?status=failed&error=ID Testimonial tidak valid");
    exit();
}

$id_testimonial = $_GET['id'];

// Query untuk menghapus berita dari database berdasarkan ID
$query = "DELETE FROM testimonial WHERE id=?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_testimonial);

// Eksekusi query
if ($stmt->execute()) {
    // Jika berhasil, redirect ke halaman manajemen konten dengan pesan sukses
    header("Location: ../testimonial.php?status=success&message=TestimonialIsDeleted");
    exit();
} else {
    // Jika terjadi error saat eksekusi query
    header("Location: ../testimonial.php?status=failed&error=TestimonialDeletedFailed");
    exit();
}
?>
