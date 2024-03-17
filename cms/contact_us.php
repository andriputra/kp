<?php 
    $page_title = "Pesan Kontak";
    require_once "reuse/header-dashboard.php"; 

    // Memasukkan file konfigurasi database
    require_once "../includes/config.php";

    // Tentukan jumlah data per halaman
    $records_per_page = 20;

    // Tentukan halaman saat ini
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Hitung offset berdasarkan halaman saat ini
    $offset = ($current_page - 1) * $records_per_page;

    // Query untuk mengambil data kontak dengan limit dan offset untuk pagination
    $query = "SELECT * FROM contact_us ORDER BY created_at DESC LIMIT $offset, $records_per_page";
    $result = mysqli_query($koneksi, $query);

    // Ambil total jumlah data kontak
    $total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM contact_us");
    $total_records = mysqli_fetch_assoc($total_records_query)['total'];

    // Hitung jumlah halaman berdasarkan total data dan data per halaman
    $total_pages = ceil($total_records / $records_per_page);
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
            <h2 class="content-dashboard-title">Data Pesan Kontak</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // Hitung nomor urutan
                        $row_number = ($current_page - 1) * $records_per_page + 1;
                        // Loop untuk menampilkan data
                        while ($row = mysqli_fetch_assoc($result)) : 
                    ?>
                        <tr>
                            <td><?php echo $row_number; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                    <?php 
                        // Increment nomor urutan
                        $row_number++;
                        endwhile; 
                    ?>
                </tbody>
            </table>

            <!-- Tampilkan pagination jika jumlah halaman lebih dari 1 -->
            <?php if ($total_pages > 1) : ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <a href="?page=<?php echo $i; ?>" class="<?php echo ($current_page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>

<?php
require_once "reuse/footer-dashboard.php"; 
?>