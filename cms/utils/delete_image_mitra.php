<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah ID gambar dikirim melalui metode POST
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Siapkan pernyataan DELETE
    $sql = "DELETE FROM mitra_kerja WHERE id = ?";
    
    if($stmt = $koneksi->prepare($sql)){
        // Bind variabel ke pernyataan persiapan sebagai parameter
        $stmt->bind_param("i", $param_id);
        
        // Set parameter
        $param_id = $_POST["id"];
        
        // Mencoba untuk mengeksekusi pernyataan persiapan
        if($stmt->execute()){
            // Redirect kembali ke halaman dashboard setelah berhasil menghapus
            header("location: ../index.php");
            exit();
        } else{
            echo "Terjadi kesalahan. Silakan coba lagi nanti.";
        }
    }
     
    // Tutup pernyataan
    $stmt->close();
     
    // Tutup koneksi
    $koneksi->close();
} else{
    // Jika ID gambar tidak ditemukan, redirect kembali ke halaman dashboard
    header("location: ../index.php");
    exit();
}
?>
