<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Proses form pengelolaan konten
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $excerpt = $_POST["excerpt"];
    $tanggal_post = $_POST["tanggal_post"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"];

    // Proses upload gambar
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Waktu saat ini
    $current_time = date('Y-m-d H:i:s');

    // Query untuk menyimpan data berita ke dalam database
    $query = "INSERT INTO berita (judul, description, excerpt, tanggal_post, kategori, gambar, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssssss", $judul, $description, $excerpt, $tanggal_post, $kategori, $gambar_name, $current_time, $current_time);

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
    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
