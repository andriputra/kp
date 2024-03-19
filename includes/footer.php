    </div>
    <footer>
        <section class="footer">
            <div class="footer-content">
                <?php
                $query_logo = "SELECT logo FROM footer_settings ORDER BY id DESC LIMIT 1";
                $result_logo = mysqli_query($koneksi, $query_logo);
                $row_logo = mysqli_fetch_assoc($result_logo);
                ?>
                
                <img class="logo-footer" src="<?php echo str_replace('../../', '', $row_logo['logo']); ?>" alt="logo">
            </div>

            <div class="footer-content">
                <?php
                $query_description = "SELECT description FROM footer_settings ORDER BY id DESC LIMIT 1";
                $result_description = mysqli_query($koneksi, $query_description);
                $row_description = mysqli_fetch_assoc($result_description);
                ?>
                <p><?php echo $row_description['description']; ?></p>
            </div>

            <div class="footer-content">
                <h4>Contact</h4>
                <ul>
                    <?php
                    $query_contact = "SELECT email, address, phone, whatsapp FROM footer_contact ORDER BY id DESC LIMIT 1";
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
                    $query_social_media = "SELECT facebook, twitter, instagram, youtube FROM social_media ORDER BY id DESC LIMIT 1";
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