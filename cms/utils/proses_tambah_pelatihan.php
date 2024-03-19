<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Memastikan bahwa form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $kelas = $_POST["kelas"];
    $postTime = $_POST["waktu_post"];

    // Proses upload gambar
    $gambar = $_FILES["gambar"];
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Query untuk menyimpan data pelatihan ke dalam database
    $query = "INSERT INTO pelatihan (judul, description, kelas, waktu_post, gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssss", $judul, $description, $kelas, $postTime, $gambar_name);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman pelatihan dengan pesan sukses
        header("Location: ../pelatihan.php?status=success");
        exit();
    } else {
        // Jika terjadi error saat eksekusi query
        header("Location: ../pelatihan.php?status=failed");
        exit();
    }
} else {
    // Jika form tidak disubmit secara valid, redirect ke halaman pelatihan dengan pesan error
    header("Location: ../pelatihan.php?status=invalid_request");
    exit();
}
?>
