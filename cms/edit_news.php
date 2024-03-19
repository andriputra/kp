<?php
$page_title = "Edit News";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";
$id_berita = $_GET['id'];
// Ambil data berita berdasarkan ID dari database
$query_get_berita = "SELECT * FROM berita WHERE id=?";
$stmt_get_berita = $koneksi->prepare($query_get_berita);
$stmt_get_berita->bind_param("i", $id_berita);
$stmt_get_berita->execute();
$result_berita = $stmt_get_berita->get_result();
$berita = $result_berita->fetch_assoc();
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit Berita</h2>
            <form action="utils/proses_edit_news.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $berita['id']; ?>">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?php echo $berita['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Konten:</label>
                    <textarea name="description" id="description" rows="6"><?php echo $berita['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt:</label>
                    <textarea name="excerpt" id="excerpt" rows="6" required><?php echo $berita['excerpt']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_post">Tanggal Post:</label>
                    <input type="date" name="tanggal_post" id="tanggal_post" value="<?php echo $berita['tanggal_post']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $berita['kategori']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn add">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
