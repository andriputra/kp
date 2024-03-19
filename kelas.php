<?php 
$page_title = "Detail Kelas";
require_once "includes/header.php"; 
require_once "includes/config.php";

// Ambil data kelas dari database
$id_pelatihan = $_GET['id'];

// Query untuk mengambil judul pelatihan dari tabel pelatihan
$query_judul_pelatihan = "SELECT judul FROM pelatihan WHERE id = $id_pelatihan";
$result_judul_pelatihan = mysqli_query($koneksi, $query_judul_pelatihan);
$row_judul_pelatihan = mysqli_fetch_assoc($result_judul_pelatihan);

// Tampilkan judul pelatihan
$judul_pelatihan = $row_judul_pelatihan['judul'];
?>
<section class="kelas-list">
    <h1>Daftar Kelas Pelatihan <?php echo $judul_pelatihan; ?></h1> <!-- Menampilkan judul pelatihan -->
    <div class="kelas-box">
        <?php 
        // Ambil data kelas dari database
        $query_kelas = "SELECT * FROM kelas WHERE id_pelatihan = $id_pelatihan";
        $result_kelas = mysqli_query($koneksi, $query_kelas);

        // Periksa apakah ada kelas yang terkait dengan pelatihan
        if (mysqli_num_rows($result_kelas) > 0) {
            // Tampilkan setiap kelas yang terkait dengan pelatihan
            while ($row_kelas = mysqli_fetch_assoc($result_kelas)) : 
            ?>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo 'assets/img/' . basename($row_kelas['gambar']); ?>" alt="<?php echo $row_kelas['nama_kelas']; ?>" class="img-fluid">
                </div>
                <div class="card-content">
                    <h3><?php echo $row_kelas['nama_kelas']; ?></h3>
                    <p><?php echo $row_kelas['info']; ?></p>
                    <a href="kelas-detail.php?id=<?php echo $row_kelas['id']; ?>" class="btn">Detail</a>
                </div>
            </div>
            <?php endwhile; ?>
        <?php } else { ?>
            <p>Tidak ada kelas yang terkait dengan pelatihan ini.</p>
        <?php } ?>
    </div>
</section>
<?php
require_once "includes/footer.php"; 
?>
