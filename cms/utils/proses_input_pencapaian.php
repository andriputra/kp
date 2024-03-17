<?php
require_once "../../includes/config.php";

// Tangani input dari form
if(isset($_POST['pelatihan_sukses'], $_POST['jumlah_peserta'])) {
    $pelatihan_sukses = $_POST['pelatihan_sukses'];
    $jumlah_peserta = $_POST['jumlah_peserta'];

    // Insert data ke dalam tabel pencapaian
    $sql = "INSERT INTO pencapaian (pelatihan_sukses, jumlah_peserta) VALUES (?, ?)";
    if($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("si", $pelatihan_sukses, $jumlah_peserta);
        if($stmt->execute()) {
            // Redirect ke halaman dashboard setelah berhasil memasukkan data
            header("location: ../dashboard.php");
            exit();
        } else {
            echo "Gagal menambahkan pencapaian.";
        }
    }

    // Tutup pernyataan
    $stmt->close();
}

// Tutup koneksi
$koneksi->close();
?>
