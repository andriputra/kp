<?php 
    $page_title = "Editor Testimonial";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";  

    // Jika pengguna sudah login, ambil nama pengguna dari sesi
    $user_name = $_SESSION['username'];

    // Menentukan jumlah testimonial per halaman
    $jumlah_per_halaman = 10;

    // Mendapatkan halaman saat ini
    $halaman = isset($_GET['page']) ? $_GET['page'] : 1;
    $mulai = ($halaman - 1) * $jumlah_per_halaman;

    // Mengambil total jumlah testimonial
    $query_jumlah_testimonial = "SELECT COUNT(*) AS total FROM testimonial";
    $result_jumlah_testimonial = mysqli_query($koneksi, $query_jumlah_testimonial);
    $row_jumlah_testimonial = mysqli_fetch_assoc($result_jumlah_testimonial);
    $total_testimonial = $row_jumlah_testimonial['total'];

    // Menghitung jumlah halaman
    $jumlah_halaman = ceil($total_testimonial / $jumlah_per_halaman);

    // Mengambil data testimonial sesuai halaman yang ditentukan
    $query_testimonial = "SELECT * FROM testimonial LIMIT $mulai, $jumlah_per_halaman";
    $result_testimonial = mysqli_query($koneksi, $query_testimonial);
?>

<div class="content-area">
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Editor Testimonial</h2>
            <!-- Form untuk mengunggah testimonial -->
            <form action="utils/proses_tambah_testimonial.php" method="POST" enctype="multipart/form-data">
                <!-- Tambahkan input untuk data testimonial -->
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="testimoni">Testimoni:</label>
                    <textarea name="testimoni" id="testimoni" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn add">Unggah Testimonial</button>
            </form>
        </div>
    </div>
    <div class="content-box">
        <div class="content-box-input">
            <h2 class="content-dashboard-title">Daftar Testimonial</h2>
            <!-- Daftar testimonial -->
            <div class="testimonial-list">
                <table class="table testimonial-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width:10%">Nama</th>
                            <th>Testimoni</th>
                            <th style="width:4%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nomor = ($halaman - 1) * $jumlah_per_halaman + 1; // Menghitung nomor urut awal
                        while ($row = mysqli_fetch_assoc($result_testimonial)) : ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['testimoni']; ?></td>
                                <td width='4%'>
                                    <a href='edit_testimonial.php?id=<?php echo $row['id']; ?>'><i class='fa-solid fa-pen'></i></a> | 
                                    <a href='utils/proses_hapus_testimonial.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Apakah Anda yakin ingin menghapus Testimonial ini?')"><i class='fa-regular fa-trash-can'></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Tampilkan navigasi halaman -->
            <div class="pagination">
                <?php 
                if ($halaman > 1) {
                    echo '<a href="?page='.($halaman - 1).'" class="page-link">&laquo; Sebelumnya</a>';
                }
                for ($i = 1; $i <= $jumlah_halaman; $i++) {
                    echo '<a href="?page='.$i.'" class="page-link '.($i == $halaman ? 'active' : '').'">'.$i.'</a>';
                }
                if ($halaman < $jumlah_halaman) {
                    echo '<a href="?page='.($halaman + 1).'" class="page-link">Selanjutnya &raquo;</a>';
                }
                ?>  
            </div>
        </div>
    </div>
</div>

<?php require_once "reuse/footer-dashboard.php"; ?>
