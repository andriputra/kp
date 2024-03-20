<?php 
$page_title = "Berita - Berita BPVP Sidoarjo";
require_once "includes/header.php"; 
require_once "includes/config.php";

// Konfigurasi pagination
$per_page = 4;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($current_page - 1) * $per_page;

// Query untuk menghitung total berita
$query_total = "SELECT COUNT(*) as total FROM berita";
$result_total = mysqli_query($koneksi, $query_total);
$total_rows = mysqli_fetch_assoc($result_total)['total'];

// Menghitung total halaman
$total_pages = ceil($total_rows / $per_page);

// Query untuk mengambil data berita sesuai pagination
$query = "SELECT * FROM berita ORDER BY tanggal_post DESC LIMIT $start, $per_page";
$result = mysqli_query($koneksi, $query);

?>

<section class="news">
    <h1>Berita - Berita BPVP Sidoarjo</h1>
    <div class="news-area">
        <?php
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
    <!-- Tampilkan pagination -->
    <div class="pagination">
        <ul>
            <!-- Tombol untuk halaman sebelumnya -->
            <li><a href="?page=<?php echo ($current_page > 1) ? $current_page - 1 : 1; ?>"><i class="fa-solid fa-circle-chevron-left"></i></a></li>
            
            <!-- Tombol untuk setiap halaman -->
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="number"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <!-- Tombol untuk halaman selanjutnya -->
            <li><a href="?page=<?php echo ($current_page < $total_pages) ? $current_page + 1 : $total_pages; ?>"><i class="fa-solid fa-circle-chevron-right"></i></a></li>
        </ul>
    </div>
</section>
        
<?php require_once "includes/footer.php"; ?>
<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
