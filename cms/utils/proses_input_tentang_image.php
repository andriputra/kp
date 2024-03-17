<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Query untuk mendapatkan ID terbaru dari tabel tentang_bpvp
$query_get_latest_id = "SELECT MAX(id) FROM tentang_bpvp";
$result_latest_id = $koneksi->query($query_get_latest_id);

// Cek apakah query berhasil dieksekusi dan data ditemukan
if ($result_latest_id && $result_latest_id->num_rows > 0) {
    $latest_id_row = $result_latest_id->fetch_assoc();
    $latest_id = $latest_id_row['MAX(id)'];
} else {
    // Jika tidak ada data ditemukan, atur ID terbaru ke nilai awal 1
    $latest_id = 1;
}

// Cek apakah ada file yang diunggah
if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Informasi file yang diunggah
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];

    // Menyimpan gambar ke direktori yang diinginkan di server
    $upload_dir = "../../assets/img/"; // Ubah sesuai dengan struktur folder Anda
    $target_file = $upload_dir . basename($file_name);

    if(move_uploaded_file($file_tmp, $target_file)) {
        // Update data di database dengan nama file gambar yang baru diunggah dan ID terbaru
        $query = "UPDATE tentang_bpvp SET featured_image = ? WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("si", $file_name, $latest_id);
        $stmt->execute();
        $stmt->close();

        // Redirect ke halaman dashboard dengan pesan sukses
        header("Location: ../tentang_kami.php?status=success");
        exit();
    } else {
        // Redirect ke halaman dashboard dengan pesan error jika ada masalah saat mengunggah file
        header("Location: ../tentang_kami.php?status=error");
        exit();
    }
} else {
    // Redirect ke halaman dashboard dengan pesan error jika tidak ada file yang diunggah
    header("Location: ../tentang_kami.php?status=error");
    exit();
}
?>
