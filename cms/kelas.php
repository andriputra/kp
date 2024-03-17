<?php 
    $page_title = "Kelas Dashboard";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";
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
            <h2 class="content-dashboard-title">Kelas Page Settings</h2>
            
        </div>
    </div>
</div>
