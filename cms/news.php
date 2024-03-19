<?php
$page_title = "News Dashboard";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";
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
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Waktu Posting</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Query untuk mengambil data berita dari database
                    $query = "SELECT * FROM berita";
                    $result = mysqli_query($koneksi, $query);

                    // Loop untuk menampilkan setiap berita dalam bentuk tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        /// Menghapus tag HTML dan mengganti tag <p> dengan spasi
                        $description = strip_tags($row['description']);
                        $description = str_replace('<p>', ' ', $description);
                        $description = str_replace('</p>', ' ', $description);
                        
                        // Mengatur panjang deskripsi maksimal menjadi 100 karakter
                        $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                        echo "<tr>";
                        echo "<td>{$row['judul']}</td>";
                        echo "<td>{$description}</td>";
                        echo "<td>{$row['tanggal_post']}</td>";
                        echo "<td><a href='edit_news.php?id={$row['id']}'><i class='fa-solid fa-pen'></i></a> | <a href='hapus_berita.php?id={$row['id']}'><i class='fa-regular fa-trash-can'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once "reuse/footer-dashboard.php"; ?>

