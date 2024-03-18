<?php 
$page_title = "About Dashboard";
require_once "reuse/header-dashboard.php"; 

// Memasukkan file konfigurasi database
require_once "../includes/config.php";

// Ambil data tentang kami dari database
$query = "SELECT * FROM tentang_bpvp ORDER BY id DESC LIMIT 1"; // Ambil data hanya 1 baris pertama
$result = $koneksi->query($query);

// Cek apakah query berhasil dieksekusi dan data ditemukan
if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc(); // Ambil data
    // Masukkan data ke dalam variabel untuk digunakan dalam nilai value pada form input
    $title_value = $data['title'];
    $description_value = $data['description'];
    $address_value = $data['address'];
    $map_embed_value = $data['map_embed'];
    $featured_image_value = $data['featured_image']; // tambahkan ini untuk menampilkan gambar yang sudah diunggah sebelumnya
} else {
    // Jika data tidak ditemukan, atur nilai awal menjadi string kosong
    $title_value = "";
    $description_value = "";
    $address_value = "";
    $map_embed_value = "";
    $featured_image_value = ""; // tambahkan ini untuk menampilkan gambar yang sudah diunggah sebelumnya
}
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Tentang Kami Page Settings</h2>
            <!-- Tampilkan gambar yang sudah diunggah sebelumnya -->
            <?php if (!empty($featured_image_value)) : ?>
                <div class="preview-image">
                    <img src="../assets/img/<?php echo $featured_image_value; ?>" alt="Featured Image" width="200">
                    <?php
                        // Mendapatkan nama file tanpa ekstensi
                        $filename = pathinfo($featured_image_value, PATHINFO_FILENAME);
                        ?>
                    <p class="name"><?php echo $filename; ?></p>
                </div>
            <?php endif; ?>
            <form action="utils/proses_input_tentang_image.php"  method="POST" enctype="multipart/form-data">
                <div class="form-action">
                    <label for="image">Featured Image Wide:</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <button type="submit" class="btn add">Simpan Gambar</button>
            </form>
            <hr>
            <!-- Form untuk mengedit data lainnya -->
            <form action="utils/proses_input_tentang.php"  method="POST">
                <div class="form-action">
                    <label for="title">Judul:</label>
                    <!-- Masukkan nilai awal dari database sebagai nilai value -->
                    <input type="text" name="title" id="title" required value="<?php echo $title_value; ?>">
                </div>
                <div class="form-action">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" rows="4" required><?php echo $description_value; ?></textarea>
                </div>
                <div class="form-action">
                    <label for="address">Alamat:</label>
                    <textarea name="address" id="address" rows="2" required><?php echo $address_value; ?></textarea>
                </div>
                <div class="form-action">
                    <label for="map_embed">Embed Map:</label>
                    <textarea name="map_embed" id="map_embed" rows="4" required><?php echo $map_embed_value; ?></textarea>
                </div>
                <button type="submit" class="btn add">Simpan Data</button>
            </form>

        </div>
    </div>
</div>
<?php 
require_once "reuse/footer-dashboard.php"; 
?>