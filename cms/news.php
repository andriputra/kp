<?php
$page_title = "News Dashboard";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";
 // Tentukan jumlah data per halaman
 $records_per_page = 5;
 $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
 $offset = ($current_page - 1) * $records_per_page;
 $query = "SELECT * FROM berita ORDER BY tanggal_post DESC LIMIT $offset, $records_per_page";
 $result = mysqli_query($koneksi, $query);

 // Ambil total jumlah data
 $total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM berita");
 $total_records = mysqli_fetch_assoc($total_records_query)['total'];

 // Hitung jumlah halaman berdasarkan total data dan data per halaman
 $total_pages = ceil($total_records / $records_per_page);
?>
<?php
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit(); 
    }
    $user_name = $_SESSION['username'];
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">News Settings</h2>
            <form action="utils/proses_tambah_news.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" name="judul" id="judul" required>
                </div>
                <div class="form-group">
                    <label for="description">Konten:</label>
                    <textarea name="description" id="description" rows="6" ></textarea>
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt:</label>
                    <textarea name="excerpt" id="excerpt" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_post">Tanggal Post:</label>
                    <input type="date" name="tanggal_post" id="tanggal_post" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" name="kategori" id="kategori" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" required>
                </div>
                <button type="submit" class="btn add">Simpan</button>
            </form>
        </div>
    </div>
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Daftar Berita</h2>
            <div class="box-table">
                <table class="table list-news">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Featured Image</th> 
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Waktu Posting</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Query untuk mengambil data berita dari database
                        $row_number = ($current_page - 1) * $records_per_page + 1;
                        // Loop untuk menampilkan setiap berita dalam bentuk tabel
                        while ($row = mysqli_fetch_assoc($result)) : 
                        $description = strip_tags($row['description']);
                        $description = str_replace('<p>', ' ', $description);
                        $description = str_replace('</p>', ' ', $description);
                        $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                    ?>
                        <tr>
                            <td><?php echo $row_number; ?></td>
                            <td><img src="../assets/img/<?php echo $row['gambar']; ?>" alt='Preview Gambar' style='max-width: 100px;'></td>
                            <td><?php echo $row['judul']; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $row['tanggal_post']; ?></td>
                            <td width='4%'>
                                <a href='edit_news.php?id=<?php echo $row['id']; ?>'><i class='fa-solid fa-pen'></i></a> | 
                                <a href='utils/proses_hapus_berita.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Apakah Anda yakin ingin menghapus Berita ini?')"><i class='fa-regular fa-trash-can'></i></a>
                            </td>
                        </tr>

                    <?php 
                        $row_number++;
                        endwhile; 
                    ?>
                    </tbody>
                </table>
                <?php if ($total_pages > 1) : ?>
                    <div class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <a href="?page=<?php echo $i; ?>" class="<?php echo ($current_page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once "reuse/footer-dashboard.php"; ?>
