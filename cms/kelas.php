<?php 
    $page_title = "Kelas Dashboard";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";
?>
<?php
    if (!isset($_SESSION['user_id'])) {
        // Jika belum, redirect ke halaman login
        header("Location: login.php");
        exit(); // Penting untuk menghentikan eksekusi file setelah redirect
    }

    // Jika pengguna sudah login, ambil nama pengguna dari sesi
    $user_name = $_SESSION['username'];
    // Proses menghapus kelas
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $query = "DELETE FROM kelas WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            header("Location: kelas.php?status=deleted");
            exit();
        } else {
            header("Location: kelas.php?status=error");
            exit();
        }
    }

    // Ambil data kelas dari database dengan urutan descending berdasarkan id
    $query = "SELECT kelas.*, pelatihan.judul AS judul_pelatihan
              FROM kelas 
              LEFT JOIN pelatihan ON kelas.id_pelatihan = pelatihan.id 
              ORDER BY kelas.id DESC";
    $result = mysqli_query($koneksi, $query);
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Kelas Settings</h2>
            <form action="utils/proses_tambah_kelas.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas:</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for="info">Keterangan:</label>
                    <textarea name="info" id="info" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for="id_pelatihan">Pelatihan:</label>
                    <select name="id_pelatihan" id="id_pelatihan" required>
                        <option value="">Pilih Pelatihan</option>
                        <?php 
                        // Ambil data pelatihan untuk dropdown
                        $query_pelatihan = "SELECT * FROM pelatihan";
                        $result_pelatihan = mysqli_query($koneksi, $query_pelatihan);
                        while ($row_pelatihan = mysqli_fetch_assoc($result_pelatihan)) : ?>
                            <option value="<?php echo $row_pelatihan['id']; ?>"><?php echo $row_pelatihan['judul']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Featured Image:</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn add">Tambah Kelas</button>
            </form>
            
            <!-- Daftar Kelas -->
            <div class="box-table">
                <table class="table pelatihan-list">
                    <thead>
                        <tr>
                            <th>Featured Image</th>
                            <th>Nama Kelas</th>
                            <th>Deskripsi</th>
                            <th>Informasi</th>
                            <th>Nama Pelatihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><img src="../assets/img/<?php echo $row['gambar']; ?>" alt="Gambar Pelatihan" style="max-width: 100px;"></td>
                                <td><?php echo $row['nama_kelas']; ?></td>
                                <td><?php echo substr($row['description'], 0, 150); ?></td>
                                <td><?php echo substr($row['info'], 0, 150); ?></td>
                                <td><?php echo $row['judul_pelatihan']; ?></td>
                                <td>
                                    <!-- <a href="edit_kelas.php?id=<?php echo $row['id']; ?>" class="btn"><i class='fa-solid fa-pen'></i></a> |  -->
                                    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"><i class='fa-regular fa-trash-can'></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
