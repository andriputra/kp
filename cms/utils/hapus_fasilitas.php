<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah ID fasilitas dikirim melalui metode POST
if(isset($_POST['id_fasilitas']) && !empty($_POST['id_fasilitas'])) {
    // Persiapkan pernyataan hapus
    $query = "DELETE FROM fasilitas_pelatihan WHERE id = ?";
    
    // Persiapkan pernyataan SQL
    $stmt = mysqli_prepare($koneksi, $query);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $_POST['id_fasilitas']);
    
    // Eksekusi pernyataan
    if(mysqli_stmt_execute($stmt)) {
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        header("Location: ../index.php?success=1");
        exit();
    } else {
        // Redirect kembali ke halaman sebelumnya dengan pesan error
        header("Location: ../index.php?error=1");
        exit();
    }
} else {
    // Redirect kembali ke halaman sebelumnya jika ID fasilitas tidak tersedia
    header("Location: ../index.php");
    exit();
}
?>
