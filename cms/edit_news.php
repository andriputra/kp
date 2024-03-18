<?php
$page_title = "Edit News";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";

// Periksa apakah ID berita telah dikirim melalui parameter URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Jika tidak ada ID berita yang diterima, redirect ke halaman news.php dengan pesan error
    header("Location: news.php?status=failed&error=ID berita tidak valid");
    exit();
}

$id_berita = $_GET['id'];

// Periksa apakah metode POST digunakan untuk mengirim data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $excerpt = $_POST["excerpt"];
    $tanggal_post = $_POST["tanggal_post"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"];
    $id_berita = $_POST["id_berita"]; // tambahkan ini untuk menangkap id berita yang akan diperbarui

    // Proses upload gambar
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Query untuk menyimpan data berita ke dalam database
    $query = "UPDATE berita SET judul=?, description=?, excerpt=?, tanggal_post=?, kategori=?, gambar=? WHERE id_berita=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssssi", $judul, $description, $excerpt, $tanggal_post, $kategori, $gambar_name, $id_berita);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman manajemen konten dengan pesan sukses
        header("Location: news.php?status=success");
        exit();
    } else {
        // Jika terjadi error saat eksekusi query
        header("Location: news.php?status=failed");
        exit();
    }
}

// Ambil data berita berdasarkan ID dari database
$query_get_berita = "SELECT * FROM berita WHERE id=?";
$stmt_get_berita = $koneksi->prepare($query_get_berita);
$stmt_get_berita->bind_param("i", $id_berita);
$stmt_get_berita->execute();
$result_berita = $stmt_get_berita->get_result();

// Periksa apakah berita dengan ID yang diberikan ada
if ($result_berita->num_rows === 0) {
    // Jika tidak ada, redirect ke halaman news.php dengan pesan error
    header("Location: news.php?status=failed&error=Berita tidak ditemukan");
    exit();
}

// Ambil data berita dari hasil query
$berita = $result_berita->fetch_assoc();
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit Berita</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
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
