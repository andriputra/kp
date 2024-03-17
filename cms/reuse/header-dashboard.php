<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : "Your Website Title"; ?></title>
    <!-- Link CSS, JavaScript, dan elemen header lainnya -->
	<link rel="stylesheet" href="../assets/style/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
        // Periksa apakah pengguna telah login
        if(isset($_SESSION['user_id'])){
            // Ambil nama pengguna dari sesi
            $user_name = $_SESSION['username'];
    ?>
        <nav>
            <ul class="top-list">
                <!-- Dropdown menu dengan nama pengguna -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Hi, <?php echo $user_name; ?></a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside>
            <a href="#" class="info-brand">Dashboard CMS</a>
            <ul class="side-menu">
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'class="active"'; ?>>
                    <a href="dashboard.php">Homepage</a>
                </li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'pelatihan.php') echo 'class="active"'; ?>>
                    <a href="pelatihan.php">Pelatihan</a>
                </li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'news.php') echo 'class="active"'; ?>>
                    <a href="news.php">News</a>
                </li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'kelas.php') echo 'class="active"'; ?>>
                    <a href="kelas.php">Kelas</a>
                </li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'tentang_kami.php') echo 'class="active"'; ?>>
                    <a href="tentang_kami.php">Tentang Kami</a>
                </li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'footer.php') echo 'class="active"'; ?>>
                    <a href="footer.php">Footer</a>
                </li>
            </ul>
        </aside>
    <?php
        }
    ?>
