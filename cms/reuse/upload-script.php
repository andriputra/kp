<?php
// Lokasi penyimpanan gambar yang diunggah
$uploadDirectory = '../../assets/img/';

// Periksa apakah ada file yang diunggah
if(isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['upload']['name'];
    $fileTmpName = $_FILES['upload']['tmp_name'];
    
    // Periksa tipe file yang diunggah
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if(!in_array($fileType, $allowedExtensions)) {
        echo json_encode(array(
            'uploaded' => false,
            'error' => array(
                'message' => 'Hanya file gambar yang diizinkan (jpg, jpeg, png, gif).'
            )
        ));
        exit();
    }
    
    // Generate nama unik untuk file
    $newFileName = uniqid() . '.' . $fileType;
    
    // Pindahkan file ke direktori penyimpanan
    if(move_uploaded_file($fileTmpName, $uploadDirectory . $newFileName)) {
        // URL lengkap gambar yang diunggah
        $fileUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $uploadDirectory . $newFileName;
        
        // Berhasil mengunggah, kirim respons JSON
        echo json_encode(array(
            'uploaded' => true,
            'url' => $fileUrl
        ));
    } else {
        // Gagal memindahkan file, kirim respons JSON dengan pesan error
        echo json_encode(array(
            'uploaded' => false,
            'error' => array(
                'message' => 'Gagal mengunggah file.'
            )
        ));
    }
} else {
    // Tidak ada file yang diunggah, kirim respons JSON dengan pesan error
    echo json_encode(array(
        'uploaded' => false,
        'error' => array(
            'message' => 'Tidak ada file yang diunggah.'
        )
    ));
}
?>
