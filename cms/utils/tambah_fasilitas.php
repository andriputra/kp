<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_fasilitas = $_POST["nama_fasilitas"];

    // Query untuk menambahkan fasilitas ke database
    $query_tambah_fasilitas = "INSERT INTO fasilitas_pelatihan (nama_fasilitas) VALUES (?)";

    // Persiapkan statement
    if ($stmt = mysqli_prepare($koneksi, $query_tambah_fasilitas)) {
        // Bind parameter ke query
        mysqli_stmt_bind_param($stmt, "s", $nama_fasilitas);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Fasilitas berhasil ditambahkan, arahkan kembali ke halaman dashboard
            header("location: ../dashboard.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menambahkan fasilitas.";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Terjadi kesalahan saat menyiapkan statement.";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
