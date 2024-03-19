<?php 
    $page_title = "Dashboard";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";

    // Query untuk mengambil data footer settings terakhir yang disimpan
    $query_footer_settings = "SELECT * FROM footer_settings ORDER BY id DESC LIMIT 1";
    $result_footer_settings = mysqli_query($koneksi, $query_footer_settings);
    $row_footer_settings = mysqli_fetch_assoc($result_footer_settings);

    // Query untuk mengambil data footer contact terakhir yang disimpan
    $query_footer_contact = "SELECT * FROM footer_contact ORDER BY id DESC LIMIT 1";
    $result_footer_contact = mysqli_query($koneksi, $query_footer_contact);
    $row_footer_contact = mysqli_fetch_assoc($result_footer_contact);

    // Query untuk mengambil data social media terakhir yang disimpan
    $query_social_media = "SELECT * FROM social_media ORDER BY id DESC LIMIT 1";
    $result_social_media = mysqli_query($koneksi, $query_social_media);
    $row_social_media = mysqli_fetch_assoc($result_social_media);
?>
<?php
    if (!isset($_SESSION['user_id'])) {
        // Jika belum, redirect ke halaman login
        header("Location: login.php");
        exit(); // Penting untuk menghentikan eksekusi file setelah redirect
    }

    // Jika pengguna sudah login, ambil nama pengguna dari sesi
    $user_name = $_SESSION['username'];
?>
<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Footer Settings</h2>
            <form action="utils/proses_simpan_footer.php" method="POST" enctype="multipart/form-data">
                <!-- Input untuk logo -->
                <label for="logo">Logo:</label>
                <?php if(isset($row_footer_settings['logo']) && !empty($row_footer_settings['logo'])): ?>
                    <img src="<?php echo str_replace('../../', '../', $row_footer_settings['logo']); ?>" alt="Logo Preview" style="max-width: 200px;">
                <?php endif; ?>
                <input type="file" name="logo" id="logo">
                
                <!-- Input untuk teks deskripsi -->
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" rows="4"><?php echo isset($row_footer_settings['description']) ? $row_footer_settings['description'] : ''; ?></textarea>
                
                <!-- Input untuk informasi kontak -->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($row_footer_contact['email']) ? $row_footer_contact['email'] : ''; ?>">
                
                <label for="address">Alamat:</label>
                <input type="text" name="address" id="address" value="<?php echo isset($row_footer_contact['address']) ? $row_footer_contact['address'] : ''; ?>">
                
                <label for="phone">No Telepon:</label>
                <input type="tel" name="phone" id="phone" value="<?php echo isset($row_footer_contact['phone']) ? $row_footer_contact['phone'] : ''; ?>">
                
                <label for="whatsapp">No WhatsApp:</label>
                <input type="tel" name="whatsapp" id="whatsapp" value="<?php echo isset($row_footer_contact['whatsapp']) ? $row_footer_contact['whatsapp'] : ''; ?>">
                
                <!-- Input untuk tautan media sosial -->
                <label for="facebook">Facebook:</label>
                <input type="text" name="facebook" id="facebook" value="<?php echo isset($row_social_media['facebook']) ? $row_social_media['facebook'] : ''; ?>">
                
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter" id="twitter" value="<?php echo isset($row_social_media['twitter']) ? $row_social_media['twitter'] : ''; ?>">
                
                <label for="instagram">Instagram:</label>
                <input type="text" name="instagram" id="instagram" value="<?php echo isset($row_social_media['instagram']) ? $row_social_media['instagram'] : ''; ?>">
                
                <label for="youtube">Youtube:</label>
                <input type="text" name="youtube" id="youtube" value="<?php echo isset($row_social_media['youtube']) ? $row_social_media['youtube'] : ''; ?>">
                
                <!-- Tombol untuk menyimpan perubahan -->
                <button type="submit" class="btn add">Simpan</button>
            </form>
        </div>
    </div>
</div>
