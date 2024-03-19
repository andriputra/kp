<?php 
$page_title = "Detail Kelas";
require_once "includes/header.php"; 
require_once "includes/config.php";

// Ambil data kelas dari database
$id_kelas = $_GET['id'];
$query_kelas = "SELECT * FROM kelas WHERE id = $id_kelas";
$result_kelas = mysqli_query($koneksi, $query_kelas);
$row_kelas = mysqli_fetch_assoc($result_kelas);
?>

<section id="sc" class="featured-image">
	<div class="slider-wrapper">
		<img src="assets/img/<?php echo $row_kelas['gambar']; ?>" alt="<?php echo $row_kelas['nama_kelas']; ?>" class="ig-fluid">
	</div>
</section>

<section>
	<div class="content-detail">
		<div class="content-detail-main">
			<h3><?php echo $row_kelas['nama_kelas']; ?></h3>
			<div class="description"><?php echo $row_kelas['description']; ?></div>
		</div>
		<div class="content-detail-sidebar">
			<h3><?php echo $row_kelas['nama_kelas']; ?></h3>
			<div class="description"><?php echo $row_kelas['info']; ?></div>
			<a href="#" class="btn">Daftar Program</a>
		</div>
	</div>
</section>

<section class="testi-area">
    <h3 class="testi-area-title">Testimoni</h3>
    <div class="testi-area-item owl-carousel owl-theme">
        <?php 
        // Query untuk mengambil testimonial dari database
        $query_testimonial = "SELECT * FROM testimonial";
        $result_testimonial = mysqli_query($koneksi, $query_testimonial);
        while ($row_testimonial = mysqli_fetch_assoc($result_testimonial)) : ?>
            <div class="testimoni-content">
				<div class="author"><?php echo $row_testimonial['nama']; ?></div>
                <p><?php echo $row_testimonial['testimoni']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<script>
	jQuery(document).ready(function($) {
		$('.testi-area-item').owlCarousel({
			items:4,
			loop:true,
			margin:10,
			nav: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			autoHeight:true
		});
	});
</script>
<?php
	require_once "includes/footer.php"; 
?>
