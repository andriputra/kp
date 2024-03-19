<?php 
$page_title = "Pelatihan Dashboard";
require_once "reuse/header-dashboard.php"; 
require_once "../includes/config.php";

// Query untuk mengambil data kelas dari database
$query_kelas = "SELECT * FROM kelas";
$result_kelas = mysqli_query($koneksi, $query_kelas);

// Pastikan pengguna telah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Jika pengguna sudah login, ambil nama pengguna dari sesi
$user_name = $_SESSION['username'];

// Proses penghapusan pelatihan jika parameter delete_id diterima
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query_delete = "DELETE FROM pelatihan WHERE id = ?";
    $stmt_delete = $koneksi->prepare($query_delete);
    $stmt_delete->bind_param("i", $delete_id);
    if ($stmt_delete->execute()) {
        header("Location: pelatihan.php?status=deleted");
        exit();
    } else {
        header("Location: pelatihan.php?status=error");
        exit();
    }
}

// Inisialisasi variabel untuk menyimpan data pelatihan yang akan diedit
$pelatihan_edit = [];

// Jika terdapat parameter edit_id, berarti dalam mode edit
if(isset($_GET['edit_id'])){
    // Ambil ID pelatihan yang akan diedit
    $edit_id = $_GET['edit_id'];

    // Ambil data pelatihan berdasarkan ID yang akan diedit
    $query_edit = "SELECT * FROM pelatihan WHERE id = ?";
    $stmt_edit = $koneksi->prepare($query_edit);
    $stmt_edit->bind_param("i", $edit_id);
    $stmt_edit->execute();
    $result_edit = $stmt_edit->get_result();

    // Pastikan pelatihan dengan ID yang diberikan ada dalam database
    if ($result_edit->num_rows == 0) {
        header("Location: pelatihan.php?status=not_found");
        exit();
    }

    // Ambil data pelatihan yang akan diedit
    $pelatihan_edit = $result_edit->fetch_assoc();
}

// Proses pengiriman formulir tambah/edit pelatihan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $description = $_POST["description"];
    $waktu_post = $_POST["waktu_post"];

    // Upload gambar jika ada
    $gambar_path = '';
    if(isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0){
        $gambar_name = $_FILES["gambar"]["name"];
        $gambar_temp = $_FILES["gambar"]["tmp_name"];
        $gambar_path = "../assets/img/" . $gambar_name;
        move_uploaded_file($gambar_temp, $gambar_path);
    }

    // Tentukan query yang akan dieksekusi berdasarkan apakah dalam mode tambah atau edit
    if(isset($_GET['edit_id'])){
        // Query untuk memperbarui data pelatihan
        $edit_id = $_GET['edit_id'];
        $query = "UPDATE pelatihan SET judul=?, description=?, waktu_post=?, gambar=? WHERE id=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssssi", $judul, $description, $waktu_post, $gambar_path, $edit_id);
    }else{
        // Query untuk menyimpan data pelatihan ke dalam database
        $query = "INSERT INTO pelatihan (judul, description, waktu_post, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssss", $judul, $description, $waktu_post, $gambar_path);
    }
    
    // Eksekusi query
    if ($stmt->execute()) {
        if(isset($_GET['edit_id'])){
            // Jika dalam mode edit, maka arahkan kembali ke halaman pelatihan setelah berhasil diupdate
            header("Location: pelatihan.php?status=updated");
        }else{
            // Jika dalam mode tambah, maka arahkan kembali ke halaman pelatihan setelah berhasil ditambahkan
            header("Location: pelatihan.php?status=success");
        }
        exit();
    } else {
        header("Location: pelatihan.php?status=failed");
        exit();
    }
}

// Ambil data pelatihan dari database
$query = "SELECT * FROM pelatihan ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Pelatihan Settings</h2>
            <!-- Form tambah/edit pelatihan -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?php echo isset($pelatihan_edit['judul']) ? $pelatihan_edit['judul'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Keterangan Pelatihan:</label>
                    <textarea name="description" id="description" rows="6"><?php echo isset($pelatihan_edit['description']) ? $pelatihan_edit['description'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="waktu_post">Waktu Post:</label>
                    <input type="datetime-local" name="waktu_post" id="waktu_post" value="<?php echo isset($pelatihan_edit['waktu_post']) ? date('Y-m-d\TH:i', strtotime($pelatihan_edit['waktu_post'])) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn add"><?php echo isset($_GET['edit_id']) ? 'Edit Pelatihan' : 'Tambah Pelatihan'; ?></button>
            </form>
            <hr>
            <!-- Daftar Pelatihan -->
            <div class="box-table">
                <table class="table pelatihan-list">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Konten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['judul']; ?></td>
                                <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar Pelatihan" style="max-width: 100px;"></td>
                                <td><?php echo substr($row['description'], 0, 150); ?></td>
                                <td>
                                    <a href="?edit_id=<?php echo $row['id']; ?>" class="btn"><i class='fa-solid fa-pen'></i></a> | 
                                    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pelatihan ini?')"><i class='fa-regular fa-trash-can'></i></a>
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
