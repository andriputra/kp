<footer>
    <section class="footer">
        <div class="footer-content">
            <?php
            // Ambil dan tampilkan logo dari database
            // Misalnya, jika logo disimpan dalam tabel 'footer_settings'
            // dengan kolom 'logo'
            $query_logo = "SELECT logo FROM footer_settings";
            $result_logo = mysqli_query($koneksi, $query_logo);
            $row_logo = mysqli_fetch_assoc($result_logo);
            ?>
            
            <img class="logo-footer" src="<?php echo str_replace('../../', '', $row_logo['logo']); ?>" alt="logo">
        </div>

        <div class="footer-content">
            <?php
            // Ambil dan tampilkan teks deskripsi dari database
            // Misalnya, jika teks disimpan dalam tabel 'footer_settings'
            // dengan kolom 'description'
            $query_description = "SELECT description FROM footer_settings";
            $result_description = mysqli_query($koneksi, $query_description);
            $row_description = mysqli_fetch_assoc($result_description);
            ?>
            <p><?php echo $row_description['description']; ?></p>
        </div>

        <div class="footer-content">
            <h4>Contact</h4>
            <ul>
                <?php
                // Ambil dan tampilkan informasi kontak dari database
                // Misalnya, jika informasi kontak disimpan dalam tabel 'footer_contact'
                // dengan kolom 'email', 'address', 'phone', 'whatsapp'
                $query_contact = "SELECT email, address, phone, whatsapp FROM footer_contact";
                $result_contact = mysqli_query($koneksi, $query_contact);
                $row_contact = mysqli_fetch_assoc($result_contact);
                ?>
                <li><a href="mailto:<?php echo $row_contact['email']; ?>">Email</a></li>
                <li><a href="#"><?php echo $row_contact['address']; ?></a></li>
                <li><a href="tel:<?php echo $row_contact['phone']; ?>"><?php echo $row_contact['phone']; ?></a></li>
                <li><a href="https://wa.me/<?php echo $row_contact['whatsapp']; ?>">WhatsApp</a></li>
            </ul>
        </div>

        <div class="footer-content">
            <h4>Sosial Media</h4>
            <ul>
                <?php
                // Ambil dan tampilkan tautan media sosial dari database
                // Misalnya, jika tautan disimpan dalam tabel 'social_media'
                // dengan kolom 'facebook', 'twitter', 'instagram', 'youtube'
                $query_social_media = "SELECT facebook, twitter, instagram, youtube FROM social_media";
                $result_social_media = mysqli_query($koneksi, $query_social_media);
                $row_social_media = mysqli_fetch_assoc($result_social_media);
                ?>
                <li><a href="<?php echo $row_social_media['facebook']; ?>"><i class='bx bxl-facebook'></i> Facebook</a></li>
                <li><a href="<?php echo $row_social_media['twitter']; ?>"><i class='bx bx-x'></i> Twitter</a></li>
                <li><a href="<?php echo $row_social_media['instagram']; ?>"><i class='bx bxl-instagram'></i> Instagram</a></li>
                <li><a href="<?php echo $row_social_media['youtube']; ?>"><i class='bx bxl-youtube'></i> Youtube</a></li>
            </ul>
        </div>
    </section>
</footer>

</body>
</html>