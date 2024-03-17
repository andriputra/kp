<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kejurusan Pelatihan</title>
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

	/*	main */

	main{
		background-color: #f0f0f0;
	}

	.card-container{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		margin-top: 100px;
	}

	.card{
		width: 325px;
		background-color: #f0f0f0;
		border-radius: 8px;
		overflow: hidden;
		box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
		margin: 20px;	
		transition: transform 0.5 ease;
	}

	.card:hover{
		transform: translateY(-2px);
	}

	.card img{
		width: 100%;
		height: auto;
	}

	.card-container{
		padding: 16px;
	}

	.card-container h3{
		font-size: 28px;
		margin-bottom: 8px;
		margin-left: 8px;
	}

	.card-container p{
		color: #666;
		font-size: 15px;
		line-height: 1.3;
		padding: 8px;
		text-align: justify;
		text-justify: inter-word;
	}

	.card-container .btn{
		display: inline-block;
		padding: 8px 16px;
		background-color: #3366ff;
		text-decoration: none;
		border-radius: 4px;
		margin-top: 10px;
		margin-left: 12px;
		margin-bottom: 12px;
		color: #fff;
		transition: background-color 0.4s ease;
	}

	.card-container .btn:hover{
		background-color: #0039e6;
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
		<section>
			<br>
			<h1>Pelatihan Di BPVP Sidoarjo</h1>
			<div class="card-container">
				<div class="card">
					<img src="assets/img/img 1.jpg">
					<div class="card-content">
						<h3>Card 1</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="kelas.php" class="btn">Detail</a>
					</div>
				</div>
				<div class="card">
					<img src="assets/img/img 2.jpg">
					<div class="card-content">
						<h3>Card 2</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="#" class="btn">Detail</a>
					</div>
				</div>
				<div class="card">
					<img src="assets/img/img 3.jpg">
					<div class="card-content">
						<h3>Card 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="#" class="btn">Detail</a>
					</div>
				</div>
				<div class="card">
					<img src="assets/img/img 3.jpg">
					<div class="card-content">
						<h3>Card 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="#" class="btn">Detail</a>
					</div>
				</div>
				<div class="card">
					<img src="assets/img/img 3.jpg">
					<div class="card-content">
						<h3>Card 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="#" class="btn">Detail</a>
					</div>
				</div>
				<div class="card">
					<img src="assets/img/img 3.jpg">
					<div class="card-content">
						<h3>Card 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
						<a href="#" class="btn">Detail</a>
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