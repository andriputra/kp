<?php
// Memasukkan file konfigurasi database
require_once "../../includes/config.php";

// Mengambil nilai yang dikirimkan dari formulir
$logo = $_FILES['logo']['name']; // Nama file logo
$description = $_POST['description']; // Deskripsi
$email = $_POST['email']; // Email
$address = $_POST['address']; // Alamat
$phone = $_POST['phone']; // Nomor Telepon
$whatsapp = $_POST['whatsapp']; // Nomor WhatsApp
$facebook = $_POST['facebook']; // Tautan Facebook
$twitter = $_POST['twitter']; // Tautan Twitter
$instagram = $_POST['instagram']; // Tautan Instagram
$youtube = $_POST['youtube']; // Tautan Youtube

// Upload logo jika ada yang diunggah
if ($_FILES['logo']['error'] == UPLOAD_ERR_OK) {
    $logo_temp = $_FILES['logo']['tmp_name'];
    $logo_path = "../../assets/img/" . $logo;
    move_uploaded_file($logo_temp, $logo_path);
} else {
    $logo_path = ""; // Jika tidak ada logo yang diunggah
}

// Menyimpan data ke dalam database
$query = "INSERT INTO footer_settings (logo, description) VALUES ('$logo_path', '$description');";
$query .= "INSERT INTO footer_contact (email, address, phone, whatsapp) VALUES ('$email', '$address', '$phone', '$whatsapp');";
$query .= "INSERT INTO social_media (facebook, twitter, instagram, youtube) VALUES ('$facebook', '$twitter', '$instagram', '$youtube');";

if (mysqli_multi_query($koneksi, $query)) {
    // Jika data berhasil disimpan, lakukan pengalihan ke footer.php
    header("Location: ../footer.php");
    exit(); // Pastikan tidak ada output lain sebelum redirect
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
