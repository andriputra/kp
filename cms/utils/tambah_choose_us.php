<?php
// Sambungkan ke database
require_once "../../includes/config.php";

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_choose = $_POST["nama_choose"];

    // Query untuk menambahkan choose ke database
    $query_tambah_choose = "INSERT INTO memilih_kami (nama_choose) VALUES (?)";

    // Persiapkan statement
    if ($stmt = mysqli_prepare($koneksi, $query_tambah_choose)) {
        // Bind parameter ke query
        mysqli_stmt_bind_param($stmt, "s", $nama_choose);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // choose berhasil ditambahkan, arahkan kembali ke halaman dashboard
            header("location: ../dashboard.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menambahkan choose.";
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
