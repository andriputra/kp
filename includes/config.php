<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // Password default kosong jika Anda tidak mengaturnya
define('DB_NAME', 'kerjapraktek'); // Ganti 'nama_database' dengan nama database Anda

/* Mencoba menghubungkan ke database MySQL */
$koneksi = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Periksa koneksi
if($koneksi === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
