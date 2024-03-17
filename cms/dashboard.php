<?php 
	$page_title = "Dashboard";
	require_once "reuse/header-dashboard.php"; 
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Home Slider</h2>
            <form action="utils/proses_input_slider.php" method="post" enctype="multipart/form-data">
                <div class="form-action">
                    <label for="gambar">Gambar Slide:</label>
                    <input type="file" name="gambar" id="gambar" required>
                </div>
                <div class="form-action">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" name="deskripsi" id="deskripsi">
                </div>
                <input type="submit" value="Add Image" class="btn add">
            </form>
        </div>
        <div class="content-box-preview">
            <?php
            // Periksa apakah pengguna sudah login
            if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])){
                header("location: login.php");
                exit;
            }

            // Sambungkan ke database
            require_once "../includes/config.php";

            // Ambil informasi pengguna dari database
            $sql = "SELECT username FROM users WHERE id = ?";
            if($stmt = $koneksi->prepare($sql)){
                $stmt->bind_param("i", $param_id);
                
                $param_id = $_SESSION["user_id"];
                
                if($stmt->execute()){
                    $stmt->store_result();
                    
                    if($stmt->num_rows == 1){                    
                        $stmt->bind_result($username);
                        if($stmt->fetch()){
                            // Selamat datang pesan
                            // echo "<h1>Selamat datang, " . htmlspecialchars($username) . "!</h1>";
                        }
                    } else{
                        echo "Informasi pengguna tidak ditemukan.";
                    }
                } else{
                    echo "Terjadi kesalahan. Silakan coba lagi.";
                }

                $stmt->close();
            }

            // Ambil daftar gambar dari database
            $sql = "SELECT id, nama, deskripsi, path FROM gambar_slider";
            $result_slider = $koneksi->query($sql);

            if ($result_slider->num_rows > 0) {
                // Tampilkan gambar dan tombol delete
                while ($row = $result_slider->fetch_assoc()) {
                    $path = str_replace("../../assets/img", "../assets/img", $row['path']);
                    ?>
                    <div class="content-box-preview-item">
                        <img src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>" width="200">
                        <p><?php echo $row['deskripsi']; ?></p>
                        <form action="utils/delete_image_sider.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" value="" class="btn delete"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "Tidak ada gambar yang tersedia.";
            }

            ?>
        </div>
    </div>
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Pencapaian yang telah dilakukan</h2>
            
            <div class="latest-data">
                <h3> Data Saat ini</h3>
                <?php
                    // Sambungkan ke database (kembali menggunakan koneksi baru)
                    $koneksi_latest = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                    if ($koneksi_latest->connect_error) {
                        die("Connection failed: " . $koneksi_latest->connect_error);
                    }

                    // Ambil data pencapaian terbaru dari database
                    $sql_latest = "SELECT * FROM pencapaian ORDER BY id DESC LIMIT 1";
                    $result_latest = $koneksi_latest->query($sql_latest);

                    if ($result_latest->num_rows > 0) {
                        while ($row = $result_latest->fetch_assoc()) {
                            echo "<p>Pelatihan: <span class='count'>" . htmlspecialchars($row['pelatihan_sukses']) . "</span></p>";
                            echo "<p>Peserta: <span class='count'>" . htmlspecialchars($row['jumlah_peserta']) . "</span></p>";
                        }
                    } else {
                        echo "Belum ada data pencapaian.";
                    }

                    $koneksi_latest->close();
                ?>
            </div>
            <form action="utils/proses_input_pencapaian.php" method="post">
                <div class="form-action">
                    <label for="sukses">Pelatihan telah sukses dilaksanakan:</label>
                    <input type="text" name="pelatihan_sukses" id="sukses" required <?php if(isset($_POST['pelatihan_sukses'])) echo 'value="' . htmlspecialchars($_POST['pelatihan_sukses']) . '"'; ?>>
                </div>
                <div class="form-action">
                    <label for="peserta">Jumlah Peserta:</label>
                    <input type="number" name="jumlah_peserta" id="peserta" <?php if(isset($_POST['jumlah_peserta'])) echo 'value="' . htmlspecialchars($_POST['jumlah_peserta']) . '"'; ?>>
                </div>
                <input type="submit" value="Submit" class="btn add">
            </form>
        </div>    
    </div>
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Fasilitas Pelatihan</h2>
            <div class="content-section facility">
                <!-- Form untuk menambahkan fasilitas pelatihan baru -->
                <form action="utils/tambah_fasilitas.php" method="post">
                    <div class="form-action">
                        <label for="nama_fasilitas">Nama Fasilitas:</label>
                        <input type="text" name="nama_fasilitas" id="nama_fasilitas" required>
                    </div>
                    <input type="submit" value="Tambah Fasilitas" class="btn add">
                </form>

                <form action="utils/tambah_gambar_fasilitas.php" method="post" enctype="multipart/form-data" >
                    <div class="form-action">
                        <label for="gambar">Fasilitas Image:</label>
                        <input type="file" name="gambar" id="gambar" required>
                    </div>
                    <input type="submit" value="Tambah Gambar" class="btn add">
                </form>
            </div>
        </div>
        <div class="content-box-preview">
            <ul>
                <?php
                // Query untuk mengambil daftar fasilitas pelatihan
                $query_fasilitas = "SELECT * FROM fasilitas_pelatihan";
                $result_fasilitas = mysqli_query($koneksi, $query_fasilitas);

                // Periksa apakah query berhasil dieksekusi
                if ($result_fasilitas) {
                    // Loop untuk menampilkan setiap fasilitas
                    while ($row_fasilitas = mysqli_fetch_assoc($result_fasilitas)) {
                        ?>
                        <li>
                            <?php echo $row_fasilitas['nama_fasilitas']; ?>
                            <!-- Tambahkan tombol hapus -->
                            <form action="utils/hapus_fasilitas.php" method="post" class="delete-form">
                                <input type="hidden" name="id_fasilitas" value="<?php echo $row_fasilitas['id']; ?>">
                                <button type="submit" class="btn delete"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        </li>
                        <?php
                    }
                } else {
                    // Tampilkan pesan error jika query gagal dieksekusi
                    echo "Error: " . mysqli_error($koneksi);
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Mengapa Memilih Kami</h2>
            <div class="content-section facility">
                <!-- Form untuk menambahkan fasilitas pelatihan baru -->
                <form action="utils/tambah_choose_us.php" method="post">
                    <div class="form-action">
                        <label for="nama_choose">Benefit Choose us:</label>
                        <input type="text" name="nama_choose" id="nama_choose" required>
                    </div>
                    <input type="submit" value="Tambah daftar" class="btn add">
                </form>

                <form action="utils/tambah_gambar_choose.php" method="post" enctype="multipart/form-data" >
                    <div class="form-action">
                        <label for="gambar">Fasilitas Image:</label>
                        <input type="file" name="gambar" id="gambar" required>
                    </div>
                    <input type="submit" value="Tambah Gambar" class="btn add">
                </form>
            </div>
        </div>
        <div class="content-box-preview">
            <ul>
                <?php
                // Query untuk mengambil daftar fasilitas pelatihan
                $query_choose = "SELECT * FROM memilih_kami";
                $result_choose = mysqli_query($koneksi, $query_choose);

                // Periksa apakah query berhasil dieksekusi
                if ($result_choose) {
                    // Loop untuk menampilkan setiap choose
                    while ($row_choose = mysqli_fetch_assoc($result_choose)) {
                        ?>
                        <li>
                            <?php echo $row_choose['nama_choose']; ?>
                            <!-- Tambahkan tombol hapus -->
                            <form action="utils/hapus_choose.php" method="post" class="delete-form">
                                <input type="hidden" name="id_choose" value="<?php echo $row_choose['id']; ?>">
                                <button type="submit" class="btn delete"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        </li>
                        <?php
                    }
                } else {
                    // Tampilkan pesan error jika query gagal dieksekusi
                    echo "Error: " . mysqli_error($koneksi);
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Mitra Slider</h2>
            <form action="utils/proses_input_mitra_slider.php" method="post" enctype="multipart/form-data">
                <div class="form-action">
                    <label for="gambar">Mitra Image Slide:</label>
                    <input type="file" name="gambar" id="gambar" required>
                </div>
                <div class="form-action">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" name="deskripsi" id="deskripsi">
                </div>
                <input type="submit" value="Add Image" class="btn add">
            </form>
        </div>
        <div class="content-box-preview">
            <?php

            // Ambil daftar gambar dari database
            $sql = "SELECT id, nama, deskripsi, path FROM mitra_kerja";
            $result_mitra_slider = $koneksi->query($sql);

            if ($result_mitra_slider->num_rows > 0) {
                // Tampilkan gambar dan tombol delete
                while ($row = $result_mitra_slider->fetch_assoc()) {
                    $path = str_replace("../../assets/img", "../assets/img", $row['path']);
                    ?>
                    <div class="content-box-preview-item">
                        <img src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>" width="200">
                        <p><?php echo $row['deskripsi']; ?></p>
                        <form action="utils/delete_image_mitra.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" value="" class="btn delete"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "Tidak ada gambar yang tersedia.";
            }

            ?>
        </div>
    </div>


</div>

<!-- Footer Includes -->
<?php 
	require_once "reuse/footer-dashboard.php"; 
?>
