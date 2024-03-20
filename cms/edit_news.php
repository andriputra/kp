<?php
$page_title = "Edit News";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php"; // Perhatikan jalur file konfigurasi

// Periksa apakah parameter ID berita diberikan
if(isset($_GET['id'])) {
    $berita_id = $_GET['id'];

    // Query untuk mengambil berita berdasarkan ID
    $query = "SELECT * FROM berita WHERE id = $berita_id";
    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $judul = $row['judul'];
        $description = $row['description'];
        $excerpt = $row['excerpt'];
        $tanggal_post = $row['tanggal_post'];
        $kategori = $row['kategori'];
    } else {
        // Redirect jika berita tidak ditemukan
        header("Location: news.php");
        exit();
    }
} else {
    // Redirect jika parameter ID tidak diberikan
    header("Location: news.php");
    exit();
}
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit News</h2>
            <form action="utils/proses_edit_berita.php" method="POST" enctype="multipart/form-data"> <!-- Perhatikan action form -->
                <input type="hidden" name="berita_id" value="<?php echo $berita_id; ?>">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?php echo $judul; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Konten:</label>
                    <textarea name="description" id="description" rows="6"><?php echo $description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt:</label>
                    <textarea name="excerpt" id="excerpt" rows="6" required><?php echo $excerpt; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_post">Tanggal Post:</label>
                    <input type="date" name="tanggal_post" id="tanggal_post" value="<?php echo $tanggal_post; ?>" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $kategori; ?>" required>
                </div>
                <button type="submit" class="btn add">Edit</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
