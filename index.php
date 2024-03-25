<?php 
	$page_title = "Homepage";
	require_once "includes/header.php"; 
?>

<main>
    <section>
        <div class="slider-wrapper">
            <div class="slider">
				<div class="main-slider owl-carousel owl-theme">
					<?php
					// Koneksi ke database
					require_once "includes/config.php";

					// Query untuk mengambil informasi gambar-gambar dari database
					$query = "SELECT * FROM gambar_slider";
					$result = mysqli_query($koneksi, $query);

					// Loop untuk menampilkan setiap gambar
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
							$path = str_replace("../../assets/img", "assets/img", $row['path']);
							?>
								<img src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>">
							<?php
						}
					} else {
						echo "Error: " . mysqli_error($koneksi);
					}
					?>
				</div>
            </div>
        </div>
    </section>

	<section id="sc" class="pencapaian">
		<h1>Pencapaian Yang Telah Dilakukan</h1>
		<div class="card-container">
			<?php
			// Query untuk mengambil data pencapaian yang telah dilakukan (hanya data terakhir)
			$query_pencapaian = "SELECT * FROM pencapaian ORDER BY id DESC LIMIT 1";
			$result_pencapaian = mysqli_query($koneksi, $query_pencapaian);

			// Periksa apakah query berhasil dieksekusi
			if ($result_pencapaian) {
				// Ambil baris pencapaian terakhir
				$row_pencapaian = mysqli_fetch_assoc($result_pencapaian);

				// Tampilkan data pencapaian
				?>
				<div class="card">
					<div class="content">
						<h2>Pelatihan telah sukses dilaksanakan</h2>
						<p><?php echo $row_pencapaian['pelatihan_sukses']; ?></p>
					</div>
				</div>
				<div class="card">
					<div class="content">
						<h2>Jumlah Peserta</h2>
						<p><?php echo $row_pencapaian['jumlah_peserta']; ?></p>
					</div>
				</div>
				<?php
			} else {
				// Tampilkan pesan error jika query gagal dieksekusi
				echo "Error: " . mysqli_error($koneksi);
			}
			?>
		</div>
	</section>
	
	<section id="sc" class="facility">
		<h1>Fasilitas Pelatihan</h1>
		<div class="content-container">
			<div class="list">
				<?php
				// Sambungkan ke database
				require_once "includes/config.php";

				// Query untuk mengambil daftar fasilitas pelatihan
				$query_fasilitas = "SELECT * FROM fasilitas_pelatihan";
				$query_fasilitas_image = "SELECT image_name FROM fasilitas_pelatihan_image";

				$result_fasilitas = mysqli_query($koneksi, $query_fasilitas);
				?>
				<ul id="un">
					<?php
					// Periksa apakah query berhasil dieksekusi
					if ($result_fasilitas) {
						// Loop untuk menampilkan setiap fasilitas
						while ($row_fasilitas = mysqli_fetch_assoc($result_fasilitas)) {
							?>
							<li id="li">
								<img id="checkmark" src="assets/img/checkmark.png" alt="checkmark"><span><span><?php echo $row_fasilitas['nama_fasilitas']; ?></span>
							</li>
							<?php
						}
					} else {
						echo "Error: " . mysqli_error($koneksi);
					}
					?>
				</ul>
				
				<?php
				$result_fasilitas_image = mysqli_query($koneksi, $query_fasilitas_image);

				// Periksa apakah query berhasil dieksekusi
				if ($result_fasilitas_image) {
					// Ambil baris pertama (karena gambar dianggap sama untuk setiap fasilitas)
					$row_fasilitas_image = mysqli_fetch_assoc($result_fasilitas_image);
					?>
					<img id="img-fasilitas" src="assets/img/<?php echo $row_fasilitas_image['image_name']; ?>" alt="image-pelatihan">
					<?php
				} else {
					// Tampilkan pesan error jika query gagal dieksekusi
					echo "Error: " . mysqli_error($koneksi);
				}
				?>
			</div>
		</div>
	</section>

	<section id="sc" class="choose-us">
		<h1>Mengapa Memilih Kami ?</h1>
		<div class="content-container">
			<div class="list">
				<?php
				// Query untuk mengambil daftar memilih kami
				$query_choose = "SELECT * FROM memilih_kami";
				$query_choose_us_image = "SELECT image_name FROM memilih_kami_gambar";

				$result_choose = mysqli_query($koneksi, $query_choose);
				?>

				<?php
				$result_choose_us_image = mysqli_query($koneksi, $query_choose_us_image);

				// Periksa apakah query berhasil dieksekusi
				if ($result_choose_us_image) {
					// Ambil baris pertama (karena gambar dianggap sama untuk setiap fasilitas)
					$row_fasilitas_image = mysqli_fetch_assoc($result_choose_us_image);
					?>
					<img id="img-fasilitas" src="assets/img/<?php echo $row_fasilitas_image['image_name']; ?>" alt="<?php echo $row_fasilitas_image['image_name']; ?>">
					<?php
				} else {
					// Tampilkan pesan error jika query gagal dieksekusi
					echo "Error: " . mysqli_error($koneksi);
				}
				?>
				<ul id="un">
					<?php
					// Periksa apakah query berhasil dieksekusi
					if ($result_choose) {
						// Loop untuk menampilkan setiap choose
						while ($row_choose = mysqli_fetch_assoc($result_choose)) {
							?>
							<li id="li">
								<img id="checkmark" src="assets/img/checkmark.png" alt="checkmark">
								<span><?php echo $row_choose['nama_choose']; ?></span>
							</li>
							<?php
						}
					} else {
						echo "Error: " . mysqli_error($koneksi);
					}
					?>
				</ul>
			</div>
		</div>
	</section>

	<section id="sc">
		<h1>Mitra Kerja</h1>
		<div class="mitra-container">
			<div class="owl-mitra owl-carousel owl-theme">
				<?php
					// Koneksi ke database
					require_once "includes/config.php";

					// Query untuk mengambil informasi gambar-gambar dari database
					$query_mitra = "SELECT * FROM mitra_kerja";
					$result_mitra = mysqli_query($koneksi, $query_mitra);

					// Loop untuk menampilkan setiap gambar
					if ($result_mitra) {
						while ($row = mysqli_fetch_assoc($result_mitra)) {
							$path = str_replace("../../assets/img", "assets/img", $row['path']);
							?>
							<img src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>">
							<?php
						}
					} else {
						echo "Error: " . mysqli_error($koneksi);
					}
				?>
			</div>
		</div>
	</section>
</main>
<script>
	jQuery(document).ready(function($) {
		$('.main-slider').owlCarousel({
			center: true,
			items: 2,
			loop: true,
			margin: 10,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true
		});
		$('.owl-mitra').owlCarousel({
			items:5,
			loop:true,
			margin:10,
			toplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true
		});
	});
</script>
<?php require_once "includes/footer.php"; ?>

<?php
	// Tutup koneksi database
mysqli_close($koneksi);
?>