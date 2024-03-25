<?php
require_once "../../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_testimoni'])) {
    $id_testimoni = $_POST['id_testimoni'];
    $nama = $_POST['nama'];
    $testimoni = $_POST['testimoni'];

    // Waktu saat ini
    $current_time = date('Y-m-d H:i:s');

    // Prepare statement untuk update berita
    $stmt = mysqli_prepare($koneksi, "UPDATE testimonial SET nama=?, testimoni=?, updated_at=? WHERE id=?");

    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "sssi", $nama, $testimoni, $current_time, $id_testimoni);

        // Execute statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Redirect ke halaman news.php setelah berhasil mengedit berita
            header("Location: ../testimonial.php?status=success&message=Berhasil mengedit testimonial");
            exit();
        } else {
            // Penanganan kesalahan jika gagal mengedit berita
            header("Location: ../testimonial.php?status=failed&message=" . mysqli_stmt_error($stmt));
            exit();
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Penanganan kesalahan jika gagal mempersiapkan pernyataan
        header("Location: ../testimonial.php?status=failed&message=Error preparing statement");
        exit();
    }
} else {
    // Redirect jika tidak ada data yang dipost
    header("Location: ../testimonial.php?status=nothing&message=Tidak ada data yang berhasil terupdate");
    exit();
}
?>
