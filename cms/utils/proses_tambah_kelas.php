<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Memastikan bahwa form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama_kelas = $_POST["nama_kelas"];
    $info = $_POST["info"];
    $gambar = $_FILES["gambar"];
    $description = $_POST["description"];   
    $id_pelatihan = $_POST["id_pelatihan"]; // Menambahkan baris untuk mengambil id_pelatihan dari formulir

    // Proses upload gambar
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    if (move_uploaded_file($gambar_tmp, $gambar_destination)) {
        // Query untuk menyimpan data kelas ke dalam database
        $query = "INSERT INTO kelas (nama_kelas, info, gambar, description, id_pelatihan) VALUES (?, ?, ?, ?, ?)"; // Menambahkan id_pelatihan ke dalam query
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssssi", $nama_kelas, $info, $gambar_name, $description, $id_pelatihan); // Menambahkan tipe data "i" untuk id_pelatihan

        // Eksekusi query
        if ($stmt->execute()) {
            // Jika berhasil, redirect ke halaman kelas dengan pesan sukses
            header("Location: ../kelas.php?status=success");
            exit();
        } else {
            // Jika terjadi error saat eksekusi query
            header("Location: ../kelas.php?status=failed");
            exit();
        }
    } else {
        // Jika gagal mengupload gambar, redirect ke halaman kelas dengan pesan error
        header("Location: ../kelas.php?status=upload_error");
        exit();
    }
} else {
    // Jika form tidak disubmit secara valid, redirect ke halaman kelas dengan pesan error
    header("Location: ../kelas.php?status=invalid_request");
    exit();
}
?>
