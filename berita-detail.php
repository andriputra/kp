<?php 
$page_title = "Detail Berita";
require_once "includes/header.php"; 
require_once "includes/config.php";

// Pastikan ada parameter ID yang diterima dari URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Ambil ID berita dari parameter URL
    $berita_id = $_GET['id'];

    // Query untuk mengambil detail berita berdasarkan ID
    $query = "SELECT * FROM berita WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $berita_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah berita ditemukan
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<section class="news-detail">
    <div class="berita-container">
        <p class="date"><?php echo date('d M Y', strtotime($row['tanggal_post'])); ?></p>
        <h1 class="title"><?php echo $row['judul']; ?></h1>
        <div class="featured">
            <img class="img-fluid" src="assets/img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>">
        </div>
        <div class="berita-content">
            <p><?php echo $row['description']; ?></p>
        </div>
    </div>
</section>
<?php
    } else {
        // Jika berita tidak ditemukan, tampilkan pesan error
        echo "<p class='error'>Berita tidak ditemukan.</p>";
    }
} else {
    // Jika parameter ID tidak diterima, tampilkan pesan error
    echo "<p class='error'>ID berita tidak ditemukan.</p>";
}

require_once "includes/footer.php"; 
?>
