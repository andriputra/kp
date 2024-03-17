<?php 
	$page_title = "Homepage";
	require_once "includes/header.php"; 
?>

<main>
    <section id="sc">
        <div class="slider-wrapper">
            <div class="slider">
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
						<div id="slide-<?php echo $row['id']; ?>">
							<img src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>">
						</div>
						<?php
					}
				} else {
					echo "Error: " . mysqli_error($koneksi);
				}
                ?>
            </div>
            <div class="slider-nav">
                <?php
                // Mengulang untuk membuat navigasi
                if ($result) {
                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a href="#slide-<?php echo $row['id']; ?>"></a>
                        <?php
                    }
                }
                ?>
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
				// Ambil kembali hasil query untuk mengambil gambar
				$result_fasilitas = mysqli_query($koneksi, $query_fasilitas);

				// Periksa apakah query berhasil dieksekusi
				if ($result_fasilitas) {
					// Ambil baris pertama (karena gambar dianggap sama untuk setiap fasilitas)
					$row_fasilitas = mysqli_fetch_assoc($result_fasilitas);
					?>
					<img id="img-fasilitas" src="assets/img/<?php echo $row_fasilitas['gambar']; ?>" alt="<?php echo $row_fasilitas['nama_fasilitas']; ?>">
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
				$result_choose = mysqli_query($koneksi, $query_choose);
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
				<?php
				// Ambil kembali hasil query untuk mengambil gambar
				$result_choose = mysqli_query($koneksi, $query_choose);

				// Periksa apakah query berhasil dieksekusi
				if ($result_choose) {
					// Ambil baris pertama (karena gambar dianggap sama untuk setiap choose)
					$row_choose = mysqli_fetch_assoc($result_choose);
					?>
					<img id="sertifikat" src="assets/img/<?php echo $row_choose['gambar']; ?>" alt="<?php echo $row_choose['nama_choose']; ?>">
					<?php
				} else {
					// Tampilkan pesan error jika query gagal dieksekusi
					echo "Error: " . mysqli_error($koneksi);
				}
				?>
			</div>
		</div>
	</section>

	<section id="sc">
		<h1>Mitra Kerja</h1>
		<div class="mitra-container">
			<div class="slide-track">
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
							<div class="slide">
								<img id="img-mitra" src="<?php echo $path; ?>" alt="<?php echo $row['deskripsi']; ?>">
							</div>
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

<?php require_once "includes/footer.php"; ?>
<?php
	// Tutup koneksi database
mysqli_close($koneksi);
?>