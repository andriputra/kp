<?php
$page_title = "News Dashboard";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";

// Proses form pengelolaan konten
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $excerpt = $_POST["excerpt"];
    $tanggal_post = $_POST["tanggal_post"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"];

    // Proses upload gambar
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_destination = "../../assets/img/" . $gambar_name;

    // Pindahkan file gambar dari temporary location ke lokasi yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Query untuk menyimpan data berita ke dalam database
    $query = "INSERT INTO berita (judul, description, excerpt, tanggal_post, kategori, gambar) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssss", $judul, $description, $excerpt, $tanggal_post, $kategori, $gambar_name);

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
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">News Settings</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
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

