<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus sesi
session_destroy();

// Arahkan pengguna ke halaman utama setelah logout
header("location: ../index.php"); // Ganti "index.php" dengan halaman utama Anda
exit;
?>
