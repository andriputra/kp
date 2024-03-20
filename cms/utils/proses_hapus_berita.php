<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah ID berita telah dikirim melalui parameter URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../news.php?status=failed&error=ID berita tidak valid");
    exit();
}

$id_berita = $_GET['id'];

// Query untuk menghapus berita dari database berdasarkan ID
$query = "DELETE FROM berita WHERE id=?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_berita);

// Eksekusi query
if ($stmt->execute()) {
    // Jika berhasil, redirect ke halaman manajemen konten dengan pesan sukses
    header("Location: ../news.php?status=success&message=Berita berhasil dihapus");
    exit();
} else {
    // Jika terjadi error saat eksekusi query
    header("Location: ../news.php?status=failed&error=Gagal menghapus berita");
    exit();
}
?>
