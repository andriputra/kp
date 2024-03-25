<?php
require_once "../../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pelatihan_id'])) {
    $pelatihan_id = $_POST['pelatihan_id'];
    // Siapkan array untuk menyimpan data yang akan diupdate
    $updates = array();

    // Periksa apakah field 'judul' diubah
    if (!empty($_POST['judul'])) {
        $updates[] = "judul='" . $_POST['judul'] . "'";
    }

    // Periksa apakah field 'description' diubah
    if (!empty($_POST['description'])) {
        $updates[] = "description='" . $_POST['description'] . "'";
    }

    // Periksa apakah field 'waktu_post' diubah
    if (!empty($_POST['waktu_post'])) {
        $updates[] = "waktu_post='" . $_POST['waktu_post'] . "'";
    }

    // Periksa apakah ada file gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar'];
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_destination = "../../assets/img/" . $gambar_name;
        move_uploaded_file($gambar_tmp, $gambar_destination);
        $updates[] = "gambar='" . $gambar_name . "'";
    }

    // Periksa apakah ada field yang diubah
    if (!empty($updates)) {
        // Generate query untuk partial update
        $query = "UPDATE pelatihan SET " . implode(",", $updates) . " WHERE id=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $pelatihan_id);

        // Eksekusi statement
        $result = $stmt->execute();

        if ($result) {
            // Redirect ke halaman pelatihan setelah berhasil mengedit
            header("Location: ../pelatihan.php?status=success&message=Berhasil mengedit pelatihan");
            exit();
        } else {
            // Penanganan kesalahan jika gagal mengedit pelatihan
            header("Location: ../pelatihan.php?status=failed&message=Gagal mengedit pelatihan");
            exit();
        }
    } else {
        // Jika tidak ada field yang diubah, redirect tanpa melakukan pembaruan
        header("Location: ../pelatihan.php?status=nochange&message=Tidak ada data yang diubah");
        exit();
    }
} else {
    // Redirect jika tidak ada data yang dipost
    header("Location: ../pelatihan.php");
    exit();
}
?>
