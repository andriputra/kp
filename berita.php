<?php 
$page_title = "Berita - Berita BPVP Sidoarjo";
require_once "includes/header.php"; 
require_once "includes/config.php";
?>
<section class="news">
    <h1>Berita - Berita BPVP Sidoarjo</h1>
    <div class="news-area">
        <?php
        // Memperbarui query untuk mengambil data berita dari database
        $query = "SELECT * FROM berita ORDER BY tanggal_post DESC LIMIT 3"; // Mengambil 3 berita terbaru
        $result = mysqli_query($koneksi, $query);

        // Loop melalui setiap baris hasil query untuk menampilkan data berita
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <div class="card">
                <div class="card-image">
                    <a href="berita-detail.php?id=<?php echo $row['id']; ?>">
                        <img src="assets/img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>">
                    </a>
                </div>
                <div class="card-content">
                    <div class="info-news">
                        <p class="date"><?php echo date('d M Y', strtotime($row['tanggal_post'])); ?></p>
                        <!-- Tambahkan kategori berita -->
                        <p class="kategori">Category: <?php echo $row['kategori']; ?></p>
                    </div>
                    <h3><a href="berita-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></a></h3>
                    <p class="paraf"><?php echo substr($row['excerpt'], 0, 250) . "..."; ?></p> <!-- Menampilkan excerpt konten -->
                    <a href="berita-detail.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>
        
<?php require_once "includes/footer.php"; ?>
<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
