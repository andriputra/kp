<?php
$page_title = "Edit Pelatihan";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php"; // Perhatikan jalur file konfigurasi

// Periksa apakah parameter ID berita diberikan
if(isset($_GET['id'])) {
    $pelatihan_id = $_GET['id'];

    // Query untuk mengambil berita berdasarkan ID
    $query = "SELECT * FROM pelatihan WHERE id = $pelatihan_id";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $judul = $row['judul'];
            $description = $row['description'];
            $waktu_post = $row['waktu_post'];
            $gambar = $row['gambar'];
        } else {
            // Redirect jika berita tidak ditemukan
            header("Location: pelatihan.php?status=success&message=berhasil menemukan id");
            exit();
        }
    } else {
        // Tampilkan pesan kesalahan jika query tidak berhasil dieksekusi
        echo "Error: " . mysqli_error($koneksi);
        exit();
    }
} else {
    // Redirect jika parameter ID tidak diberikan
    header("Location: pelatihan.php?status=error&message=tidak berhasil menemukan id");
    exit();
}
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit Pelatihan</h2>
            <form action="utils/proses_edit_pelatihan.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pelatihan_id" value="<?php echo $pelatihan_id; ?>">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?php echo $judul; ?>" >
                </div>
                <div class="form-group">
                    <label for="description">Keterangan Pelatihan:</label>
                    <textarea name="description" id="description" rows="6" ><?php echo $description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="waktu_post">Waktu Post:</label>
                    <input type="datetime-local" name="waktu_post" id="waktu_post" value="<?php echo $waktu_post ?>" >
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" id="gambar">
                    <img src="<?php echo $gambar ?>" alt="Gambar Pelatihan" style="max-width: 100px;">
                </div>
                <button type="submit" class="btn add">Edit</button>
            </form>   
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
