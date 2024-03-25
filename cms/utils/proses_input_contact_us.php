<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";
if(isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit(); // Penting untuk menghentikan eksekusi file setelah redirect
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO contact_us (name, email, message) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();

    // Redirect ke halaman terima kasih atau halaman lain yang sesuai
    header("Location: ../../tentang-kami.php?status=successTerkirim");
    exit();
} else {
    // Redirect jika bukan metode POST
    header("Location: ../../tentang-kami.php?status=successTerkirim");
    exit();
}
?>
