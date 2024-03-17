<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kelas</title>
	<link rel="stylesheet"
	href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

	/*	Header */
	* {
		box-sizing: border-box;
		margin: 0;
		padding: 0;
		text-decoration: none;
	}

	h1 {
		color: #333;
		font-size: 36px;
		margin-bottom: 20px;
		margin-left: 20px;
	}

	header li, header a, header button {
		font-family: 'Montserrat', sans-serif;
		font-weight: 500;
		font-size: 14px;
		color: #ecf0f1;
		text-decoration: none;
	}

	header{
		display: flex;
		justify-content: flex-end;
		align-items: center;
		padding: 20px 5%;
		background-color: rgba(19, 54, 101, 1);
	}

	.logo{
		cursor: pointer;
		height: 80px;
		width: 80px;
		margin-right: auto ;
	}

	.nav_links{
		list-style: none;
	}

	.nav_links li{
		display: inline-block;
		padding: 0px 20px;
	}

	.nav_links li a{
		transition: all 0.3s ease 0s;
	}

	.nav_links li a:hover{
		color: #0088a9;
	}

	button{
		margin-left: 20px;
		padding: 9px 25px;
		background-color: rgba(0, 136, 169, 1);
		border: none;
		border-radius: 50px;
		cursor: pointer;
		transition: all 0.3s ease 0s;
	}

	button:hover{
		background-color: rgba(0, 136, 169, 0.8);
	}

	/* Main */
	main {
		background-color: #fff;
		box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
		margin-left: 5px;
		margin-right: 5px;
	}

	.slider-wrapper {
		position: relative;
		max-width: 95%;
		height: 600px;
		margin: 0 auto;
		overflow: hidden;
		padding: 8px;
		top: 10px;
	}

	.slider {
		display: flex;
		aspect-ratio: 16 / 9;
		overflow-x: auto;
		scroll-snap-type: x mandatory;
		scroll-behavior: smooth;
		box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
		border-radius: 0.5rem;
	}

	.slider img {
		flex: 1 0 100%;
		scroll-snap-align: start;
		object-fit: cover;
		max-width: 1280px;
	}


	.slider img.active {
		border: 2px solid #fff; 
	}

	.slider-nav {
		display: flex;
		column-gap: 1rem;
		position: absolute;
		bottom: 1.25rem;
		left: 50%;
		transform: translateX(-50%);
		z-index: 1; 
	}

	.slider-nav a {
		width: 0.5rem;
		height: 0.5rem;
		border-radius: 50%;
		background-color: #fff;
		opacity: 0.75;
		transition: opacity ease 250ms;
	}

	.slider-nav a:hover {
		opacity: 1;
		background-color: blueviolet;
	}

	.card-container {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		margin-top: 10px;
	}

	.testimoni-container {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		margin-top: 10px;
	}

	.testimoni-content {
		width: 325px;
		background-color: #f0f0f0;
		border-radius: 8px;
		overflow: hidden;
		box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
		margin: 20px;
		transition: transform 0.5s ease;
		padding: 15px;
	}

	.testimoni-content:hover {
		transform: translateY(-2px);
	}

	#testimoni {
		margin-left: 24px;
	}

	.card {
		padding: 15px;
	}

	.card img {
		height: auto;
		width: 100%;
	}

	.card-content {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-evenly;
		margin-top: 20px;
	}

	.card-detail {
		width: calc(50% - 10px);
		box-sizing: border-box;
		margin-bottom: 20px;
	}

	.card-summary {
		width: calc(50% - 10px);
		box-sizing: border-box;
		margin-bottom: 20px;
	}

	.btn{
		display: flex;
		width: 368px;
		height: 48px;
		padding: 8px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		flex-shrink: 0;
		border-radius: 12px;
		background: #a6a6a6;
		color: black;
		transition: background-color 0.4s ease;
		font-weight: bold;
	}

	.btn:hover{
		background-color: #666666;
	}

	.peluang {
		width: 100%;
		box-sizing: border-box;
	}

	h3 {
		font-size: 24px;
	}

	.card-container h4 {
		font-size: 18px;
	}

	p {
		color: #666;
		font-size: 15px;
		line-height: 1.3;
		padding: 8px;
		text-align: justify;
		text-justify: inter-word;
	}

	.card-container .card-summary {
		width: 416px;
		height: auto;
		flex-shrink: 0;
		border-radius: 16px;
		border: 2px solid var(--Blue--90, #E8F1FE);
		background: var(--Grayscale-0, #FFF);
		padding: 15px;
	}

	/*	Footer CSS */

	.footer {
		margin-top: 10px;
		padding-top: 30px;
		padding-left: 20px;
		padding-right: 20px;
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(200px, auto));
		gap: 3.5rem;
		background-color: rgba(19, 54, 101, 1);
	}

	.logo-footer{
		height: 200px;
		width: 200px;
	}

	.footer-content h4{
		color: #fff;
		margin-bottom: 1.5rem;
		font-size: 20px;
	}

	.footer-content li{
		margin-bottom: 16px;
	}

	.footer-content li a{
		display: block;
		color: #d6d6d6;
		font-size: 15px;
		font-weight: 400px;
		transition: all 0.4s ease;
	}

	.footer-content li a:hover{
		transform: translateY(-3px) translateX(-5px);
		color: #fff;
	}

	.footer-content p {
		color: #d6d6d6;
		font-size: 16px;
		line-height: 25px; 
		margin: 10px 0;
		text-align: justify;
		word-wrap: break-word;
	}

	.footer-content ul{
		list-style: none;
	}
</style>

<body>
	<header>
		<img class="logo" src="assets/img/logo.png" alt="logo">
		<nav>
			<ul class="nav_links">
				<li><a href="index.php">Beranda</a></li>
				<li><a href="pelatihan.php">Kejuruan Pelatihan</a></li>
				<li><a href="tentang-kami.php">Tentang Kami</a></li>
				<li><a href="berita.php">Berita</a></li>
			</ul>
		</nav>
		<a class="cta" href="index.php"><button>Daftar</button></a>
	</header>

	<main>
		<section id="sc">
			<div class="slider-wrapper">
				<div class="slider">
					<div id="slide-1">
						<img src="assets/img/img 1.jpg" alt="gambar 1">
					</div>
					<div id="slide-2">
						<img src="assets/img/img 2.jpg" alt="gambar 2">
					</div>
					<div id="slide-3">
						<img src="assets/img/img 3.jpg" alt="gambar 3">
					</div>
					<div id="slide-4">
						<img src="assets/img/img 4.jpg" alt="gambar 4">
					</div>
					<div id="slide-5">
						<img src="assets/img/img 5.jpg" alt="gambar 4">
					</div>
				</div>
				<div class="slider-nav">
					<a href="#slide-1"></a>
					<a href="#slide-2"></a>
					<a href="#slide-3"></a>
					<a href="#slide-4"></a>
					<a href="#slide-5"></a>
				</div>
			</div>
		</section>

		<section>
			<div class="card-container">
				<div class="card">
					
					<div class="card-content">
						<div class="card-detail">
							<h3>Nama Kelas</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="card-summary">
							<h3>Nama Kelas</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.</p>
							<h4>Hasil Pelatihan</h4>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<a href="#" class="btn">Daftar Program</a>
						</div>
						<div class="peluang">
							<h3>Peluang Kerja</h3>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p><i class='bx bx-check' style='color:#227bd9'  ></i>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<h3 id="testimoni">Testimoni</h3>
			<div class="testimoni-container">
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="testimoni-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</div>
			</div>
		</section>
	</main>

	<footer>
		<section class="footer">
			<div class="footer-content">
				<img class="logo-footer" src="assets/img/logo.png" alt="logo">
			</div>

			<div class="footer-content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>

			<div class="footer-content">
				<h4>Contact</h4>
				<ul>
					<li><a href="#">Email</a></li>
					<li><a href="#">Alamat</a></li>
					<li><a href="#">No Telepon</a></li>
					<li><a href="#">No Wa</a></li>
				</ul>
			</div>

			<div class="footer-content">
				<h4>Sosial Media</h4>
				<ul>
					<li><a href="#"><i class='bx bxl-facebook'></i> Facebook</a></li>
					<li><a href="#"><i class='bx bx-x'></i> Twitter</a></li>
					<li><a href="#"><i class='bx bxl-instagram'></i> Instagram</a></li>
					<li><a href="#"><i class='bx bxl-youtube'></i> Youtube</a></li>
				</ul>
			</div>
		</section>
	</footer>
</body>
</html>