<?php
require_once "../../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang diinput dari form
    $title = $_POST["title"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $map_embed = $_POST["map_embed"];

    // Menyiapkan query untuk menyimpan data ke database
    $query = "INSERT INTO tentang_bpvp (title, description, address, map_embed) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssss", $title, $description, $address, $map_embed);

    // Menjalankan query
    if ($stmt->execute()) {
        // Redirect ke halaman dashboard dengan pesan sukses
        header("Location: ../tentang_kami.php?status=success");
        exit();
    } else {
        // Redirect ke halaman tentang_kami dengan pesan error jika gagal menyimpan data
        header("Location: ../tentang_kami.php?status=error");
        exit();
    }
} else {
    // Redirect ke halaman tentang_kami jika tidak ada request POST
    header("Location: ../tentang_kami.php");
    exit();
}
?>
