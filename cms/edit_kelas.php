<?php 
    $page_title = "Edit Kelas";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['user_id'])) {
        // Jika belum, redirect ke halaman login
        header("Location: login.php");
        exit(); // Penting untuk menghentikan eksekusi file setelah redirect
    }

    // Periksa apakah ada ID kelas yang diberikan
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: kelas.php");
        exit();
    }

    $kelas_id = $_GET['id'];

    // Ambil data kelas dari database berdasarkan ID
    $query_kelas = "SELECT * FROM kelas WHERE id = ?";
    $stmt_kelas = $koneksi->prepare($query_kelas);
    $stmt_kelas->bind_param("i", $kelas_id);
    $stmt_kelas->execute();
    $result_kelas = $stmt_kelas->get_result();
    $kelas = $result_kelas->fetch_assoc();

    // Proses pengeditan kelas
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_kelas = $_POST['nama_kelas'];
        $description = $_POST['description'];
        $info = $_POST['info'];
        $id_pelatihan = $_POST['id_pelatihan'];

        // Update data kelas ke database
        $query_update = "UPDATE kelas SET nama_kelas = ?, description = ?, info = ?, id_pelatihan = ? WHERE id = ?";
        $stmt_update = $koneksi->prepare($query_update);
        $stmt_update->bind_param("ssssi", $nama_kelas, $description, $info, $id_pelatihan, $kelas_id);
        
        if ($stmt_update->execute()) {
            header("Location: kelas.php?status=updated");
            exit();
        } else {
            header("Location: kelas.php?status=error");
            exit();
        }
    }
?>
<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Edit Kelas</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas:</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" rows="6"><?php echo $kelas['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="info">Keterangan:</label>
                    <textarea name="info" id="info" rows="6"><?php echo $kelas['info']; ?></textarea>
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
                            <option value="<?php echo $row_pelatihan['id']; ?>" <?php if($row_pelatihan['id'] == $kelas['id_pelatihan']) echo "selected"; ?>><?php echo $row_pelatihan['judul']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn add">Update Kelas</button>
            </form>
        </div>
    </div>
</div>
<?php require_once "reuse/footer-dashboard.php"; ?>
