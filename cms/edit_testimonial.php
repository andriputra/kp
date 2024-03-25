<?php
$page_title = "Edit Testimonial";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php"; 

// Periksa apakah parameter ID berita diberikan
if(isset($_GET['id'])) {
    $id_testimoni = $_GET['id'];

    // Query untuk mengambil berita berdasarkan ID
    $query = "SELECT * FROM testimonial WHERE id = $id_testimoni";
    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $testimoni = $row['testimoni'];
    } else {
        // Redirect jika berita tidak ditemukan
        header("Location: testimonial.php?status=success&message=berhasil menemukan id");
        exit();
    }
} else {
    // Redirect jika parameter ID tidak diberikan
    header("Location: testimonial.php?status=error&message=tidak berhasil menemukan id");
    exit();
}
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit Testimonial</h2>
            <form action="utils/proses_edit_testimonial.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_testimoni" value="<?php echo $id_testimoni; ?>">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required>
                </div>
                <div class="form-group">
                    <label for="testimoni">Testimonial:</label>
                    <textarea name="testimoni" id="testimoni" rows="6"><?php echo $testimoni; ?></textarea>
                </div>
                <button type="submit" class="btn add">Edit</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
