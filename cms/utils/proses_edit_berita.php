<?php
require_once "../../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['berita_id'])) {
    $berita_id = $_POST['berita_id'];
    $judul = $_POST['judul'];
    $description = $_POST['description'];
    $excerpt = $_POST['excerpt'];
    $tanggal_post = $_POST['tanggal_post'];
    $kategori = $_POST['kategori'];

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE berita SET judul=?, description=?, excerpt=?, tanggal_post=?, kategori=? WHERE id=?");

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "sssssi", $judul, $description, $excerpt, $tanggal_post, $kategori, $berita_id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect ke halaman news.php setelah berhasil mengedit berita
        header("Location: ../news.php?status=success&message=Berhasil mengedit berita");
        exit();
    } else {
        // Penanganan kesalahan jika gagal mengedit berita
        header("Location: ../news.php?status=failed&message=Gagal mengedit berita");
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect jika tidak ada data yang dipost
    header("Location: ../news.php");
    exit();
}
?>
