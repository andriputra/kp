<?php 
$page_title = "Tentang Kami";
require_once "includes/header.php"; 
require_once "includes/config.php";

// Mengambil data tentang BPVP dari database (memperbarui query)
$query = "SELECT * FROM tentang_bpvp ORDER BY id DESC LIMIT 1"; // Mengambil data terbaru berdasarkan ID dengan batasan 1
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Menampilkan data tentang BPVP
?>
<section class="contact">
    <div class="featured-image">
        <?php if (!empty($row['featured_image'])) : ?>
            <img class="cover" src="assets/img/<?php echo $row['featured_image']; ?>" alt="Gambar">
        <?php else : ?>
            <img class="cover" src="assets/img/img 7.jpg" alt="Default Gambar">
        <?php endif; ?>
    </div>
    <div class="kami-container">
        <h1><?php echo $row['title']; ?></h1>
        <div class="kami-content">
            <div class="contact-content">
                <p><?php echo $row['description']; ?></p>
            </div>
            <div class="contact-content featured">
                <?php if (!empty($row['featured_image'])) : ?>
                    <img class="img-cover" src="assets/img/<?php echo $row['featured_image']; ?>" alt="Gambar">
                <?php else : ?>
                    <img class="img-cover" src="assets/img/img 7.jpg" alt="Default Gambar">
                <?php endif; ?>
            </div>
        </div>
        <h1>Alamat BPVP Sidoarjo</h1>
        <div class="kami-content">
            <div class="address">
                <i class="fa-solid fa-location-dot"></i>
                <span><strong>BPVP SIDOARJO</strong> <?php echo $row['address']; ?></span>
            </div>
            <?php echo $row['map_embed']; ?>
        </div>
        <h1>Contact Us</h1>
        <div class="contact-us">
            <form class="area-one" action="cms/utils/proses_input_contact_us.php" method="POST">
                <div class="form-action">
                    <label for="name">Name:</label>
                    <input class="input-action" type="text" name="name" id="name" value="" require>
                </div>
                <div class="form-action">
                    <label for="email">Email:</label>
                    <input class="input-action" type="email" name="email" id="email" value="" require>
                </div>
                <div class="form-action">
                    <label for="message">Message:</label>
                    <textarea class="input-action" name="message" id="message" value="" row=4></textarea>
                </div>
                <button type="submit" class="btn add">Kirim</button>
            </form>
            <?php
            // Menampilkan pesan sukses jika ada
            if (isset($_GET['status']) && $_GET['status'] === 'success') {
                echo '<p class="success-message">Pesan berhasil dikirim!</p>';
            }
            ?>
        </div>
    </div>
</section>

<?php require_once "includes/footer.php"; ?>
<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
