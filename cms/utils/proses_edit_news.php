<?php
// Sambungkan ke database
require_once "../../includes/config.php";


// Periksa apakah ID berita telah dikirim melalui parameter URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../news.php?status=failed&error=ID berita tidak valid");
    exit();
}

$id_berita = $_GET['id'];

// Periksa apakah metode POST digunakan untuk mengirim data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $excerpt = $_POST["excerpt"];
    $tanggal_post = $_POST["tanggal_post"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"];
    $id_berita = $_POST["id_berita"]; // tambahkan ini untuk menangkap id berita yang akan diperbarui

    // Proses upload gambar
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Query untuk menyimpan data berita ke dalam database
    $query = "UPDATE berita SET judul=?, description=?, excerpt=?, tanggal_post=?, kategori=?, gambar=? WHERE id_berita=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssssi", $judul, $description, $excerpt, $tanggal_post, $kategori, $gambar_name, $id_berita);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman manajemen konten dengan pesan sukses
        header("Location: ../news.php?status=success");
        exit();
    } else {
        // Jika terjadi error saat eksekusi query
        header("Location: ../news.php?status=failed");
        exit();
    }
}

// Ambil data berita berdasarkan ID dari database
$query_get_berita = "SELECT * FROM berita WHERE id=?";
$stmt_get_berita = $koneksi->prepare($query_get_berita);
$stmt_get_berita->bind_param("i", $id_berita);
$stmt_get_berita->execute();
$result_berita = $stmt_get_berita->get_result();

// Periksa apakah berita dengan ID yang diberikan ada
if ($result_berita->num_rows === 0) {
    // Jika tidak ada, redirect ke halaman news.php dengan pesan error
    header("Location: ../news.php?status=failed&error=Berita tidak ditemukan");
    exit();
}

// Ambil data berita dari hasil query
$berita = $result_berita->fetch_assoc();
?>