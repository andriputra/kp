<?php 
    $page_title = "Pelatihan";
    require_once "includes/header.php"; 
    require_once "includes/config.php";

    // Jumlah item per halaman
    $items_per_page = 6;

    // Mendapatkan nomor halaman dari parameter GET, defaultnya adalah 1
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Menghitung offset untuk query database berdasarkan halaman saat ini
    $offset = ($current_page - 1) * $items_per_page;

    // Query untuk mendapatkan jumlah total item
    $total_items_query = "SELECT COUNT(*) AS total FROM pelatihan";
    $total_items_result = mysqli_query($koneksi, $total_items_query);
    $total_items_row = mysqli_fetch_assoc($total_items_result);
    $total_items = $total_items_row['total'];

    // Menghitung jumlah halaman berdasarkan total item dan item per halaman
    $total_pages = ceil($total_items / $items_per_page);

    // Query untuk mendapatkan data pelatihan dengan batasan per halaman
    $query = "SELECT * FROM pelatihan ORDER BY id DESC LIMIT $offset, $items_per_page";
    $result = mysqli_query($koneksi, $query);
?>

<section class="pelatihan">
    <h1>Pelatihan Di BPVP Sidoarjo</h1>
    <div class="card-area">
        <?php
            // Loop melalui setiap baris hasil query untuk menampilkan data berita
            while ($row = mysqli_fetch_assoc($result)) :
        ?>
        <div class="card">
            <div class="card-image">
                <a href="kelas.php?id=<?php echo $row['id']; ?>">
                    <img src="<?php echo 'assets/img/' . basename($row['gambar']); ?>" alt="<?php echo $row['judul']; ?>" class="img-fluid">
                </a>
            </div>
            <div class="card-content">
                <h3><a href="kelas.php?id=<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></a></h3>
                <?php echo substr($row['description'], 0, 250) . "..."; ?>
                <a href="kelas.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
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
