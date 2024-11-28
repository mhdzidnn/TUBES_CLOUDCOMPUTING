<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-section">
        <img src="assets/img/background-1.jpeg" alt="Global">
        <div>
            <h1>Welcome to Our Website</h1>
            <p>Add Cloud</p>
            <div class="buttons">
                <a href="{{ url('/home') }}">HOME</a>
                <a href="{{ url('/contact') }}">CONTACT US</a>
            </div>
        </div>
    </div>
    <div class="info-section">
        <img src="assets/img/cloud-1.jpeg" alt="Cloud Computing">
        <div>
            <h2>Apa itu Cloud</h2>
            <p>Cloud computing adalah sebuah konsep di mana data (seperti penyimpanan, pengolahan data, aplikasi) disimpan dan diakses melalui internet daripada disimpan di dalam komputer atau server lokal. Ini memungkinkan pengguna untuk mengakses data dan menggunakan aplikasi dari mana saja dengan koneksi internet, tanpa perlu membeli infrastruktur fisik sendiri. Hal ini telah menjadi populer karena fleksibilitasnya dalam menyediakan sumber daya IT secara on-demand dan biayanya yang bisa disesuaikan dengan kebutuhan bisnis atau individu.</p>
        </div>
    </div>
    <div class="features-section">
        <h2>Protect your data at all times</h2>
        <p>Menggabungkan dan mencadangkan seluruh data digital Anda ke dalam satu platform. Melindungi dari serangan ransomware dan ancaman lainnya, serta memulihkan data penting dengan cepat jika terjadi penghapusan atau kehilangan tidak sengaja, guna memastikan kelangsungan bisnis.</p>
        <div class="features-list">
            <?php
            $features = [
                ["img" => "assets/img/Privately.jpeg", "title" => "Safety and Privately Data Share", "desc" => "Add Cloud menjamin keamanan dan privasi data Anda saat berbagi akses dengan orang lain"],
                ["img" => "assets/img/EasySave.jpeg", "title" => "Easy to Save & Share Data", "desc" => "Add Cloud memungkinkan penyimpanan dan berbagi data dengan cepat dan mudah"],
                ["img" => "assets/img/PortableFast.jpeg", "title" => "Portable and Fast", "desc" => "Solusi portabel yang memberikan akses cepat ke data Anda dari mana saja"],
                ["img" => "assets/img/CentralizedStorage.jpeg", "title" => "Centralized Storage", "desc" => "Menyediakan penyimpanan terpusat untuk pengelolaan data yang efisien"],
                ["img" => "assets/img/ExpandStorage.jpeg", "title" => "Expand and Manage Storage", "desc" => "Add Cloud memungkinkan Anda untuk memperluas dan mengelola kapasitas penyimpanan sesuai kebutuhan"]
            ];
            foreach ($features as $feature) {
                echo '<div class="feature-item">';
                echo '<img src="' . $feature['img'] . '" alt="' . $feature['title'] . '">';
                echo '<h3>' . $feature['title'] . '</h3>';
                echo '<p>' . $feature['desc'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="benefits-section">
        <img src="assets/img/Kenapa.jpeg" alt="Kenapa Harus Cloud">
        <div>
            <h2>Kenapa Harus Cloud</h2>
            <ul class="benefits-list">
                <li><span>1. Keamanan Data Terjamin</span> Data yang disimpan secara lokal rentan terhadap kerusakan fisik, pencurian, atau serangan malware. Add Cloud Menyediakan enkripsi tingkat tinggi dan perlindungan data yang kuat, memastikan data anda selalu aman dan terlindungi dari ancaman cyber.</li>
                <li><span>2. Akses Mudah dan Cepat dari Mana Saja</span> Data yang disimpan di perangkat internal device hanya dapat diakses dari perangkat tersebut, membatasi mobilitas dan fleksibilitas. Kami Memberikan akses cepat dan mudah ke data Anda dari berbagai perangkat dan lokasi, sehingga Anda dapat bekerja secara efisien di mana saja dan kapan saja.</li>
                <li><span>3. Penyimpanan Terpusat yang Efisien</span> Pengelolaan data yang tersebar di berbagai perangkat terpisah akan merepotkan dan memakan waktu. Add Cloud Menyediakan platform penyimpanan terpusat yang memudahkan pencarian, pengelolaan, dan pengaturan file, yang meningkatkan efisiensi operasional anda.</li>
                <li><span>4. Skalabilitas dan Fleksibilitas Penyimpanan</span> Menambah kapasitas penyimpanan lokal memerlukan pengadaan hardware tambahan yang mahal dan memakan waktu. Produk kami Menyediakan fleksibilitas untuk memperluas dan mengelola kapasitas penyimpanan sesuai kebutuhan Anda tanpa investasi besar dalam hardware, mendukung pertumbuhan bisnis anda tanpa hambatan.</li>
                <li><span>5. Pemulihan Data</span> Kehilangan data karena kerusakan perangkat atau penghapusan tidak sengaja dapat mengganggu operasional bisnis atau kegiatan sehari-hari. Kami menyediakan mekanisme pemulihan data yang cepat dan andal, memastikan data penting anda dapat segera dipulihkan jika terjadi kehilangan atau kerusakan.</li>
            </ul>
        </div>
    </div>
    <div class="products-section">
        <h2>Our Products</h2>
        <div class="product-list">
            <?php
            $products = [
                ["img" => "assets/img/RS4021.jpeg", "name" => "RS4021xs+", "specs" => ["16 bays", "Intel Xeon D-1541 8-core 2.1GHz", "Turbo Boost up to 2.7GHz", "8 x 1GbE, 2 x 10GbE", "96 GB DDR4 ECC RAM"]],
                ["img" => "assets/img/FS3600.jpeg", "name" => "FS3600", "specs" => ["24 bays", "Intel Xeon D-1567 12-core 2.1GHz", "Turbo Boost up to 2.7GHz", "32 GB DDR4 ECC RAM"]],
                ["img" => "assets/img/DS1821.jpeg", "name" => "DS1821+", "specs" => ["8 bays", "AMD Ryzen V1500B 4-core 2.2GHz", "16 GB DDR4 ECC RAM"]],
                ["img" => "assets/img/DS3622.jpeg", "name" => "DS3622xs+", "specs" => ["12 bays", "Intel Xeon D-1527 4-core 2.2GHz", "32 GB DDR4 ECC RAM"]],
                ["img" => "assets/img/DS723.jpeg", "name" => "DS723+", "specs" => ["2 bays", "AMD Ryzen R1600 2-core 2.6GHz", "4 GB DDR4 ECC RAM"]],
                ["img" => "assets/img/RS422.jpeg", "name" => "RS422+", "specs" => ["4 bays", "AMD Ryzen V1500B 4-core 2.2GHz", "16 GB DDR4 ECC RAM"]],
            ];
            foreach ($products as $product) {
                echo '<div class="product-item">';
                echo '<img src="' . $product['img'] . '" alt="' . $product['name'] . '">';
                echo '<h3>' . $product['name'] . '</h3>';
                foreach ($product['specs'] as $spec) {
                    echo '<p>' . $spec . '</p>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="video-section">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/28H1kBaPOlw?si=8hMyt8tgKUlfinPq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div>
            <h2>Learn More About Add Cloud</h2>
            <p>Tonton video untuk mengetahui lebih lanjut tentang bagaimana Add Cloud dapat membantu bisnis Anda.</p>
        </div>
    </div>

    <section class="testimonials-section">
        <img src="assets/img/Testimonial.jpeg" alt="Testimonials Background" class="background">
        <h2>Testimoni Pelanggan</h2>
        <div class="testimonial-content">
            <?php
            $testimonials = [
                ["img" => "assets/img/testimoni-1.jpeg", "text" => "\"Produk ini benar-benar mengubah hidup saya!\"", "name" => "Pelanggan 1"],
                ["img" => "assets/img/testimoni-2.jpeg", "text" => "\"Saya sangat merekomendasikan produk ini.\"", "name" => "Pelanggan 2"],
                ["img" => "assets/img/testimoni-3.jpeg", "text" => "\"Layanan pelanggan yang luar biasa dan produk yang berkualitas.\"", "name" => "Pelanggan 3"]
            ];

            foreach ($testimonials as $testimonial) {
                echo '<div class="testimonial-item">';
                echo '<img src="' . $testimonial['img'] . '" alt="' . $testimonial['name'] . '">';
                echo '<p>' . $testimonial['text'] . '</p>';
                echo '<p>- ' . $testimonial['name'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <div class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-content">
            <?php
            $faqs = [
                ["question" => "How secure is my data?", "answer" => "With AES encryption at its core, you can't get safer than AddCloud!"],
                ["question" => "What about my storage limit?", "answer" => "Infinite, our plans offer unlimited storage!"],
                ["question" => "How easily can I switch?", "answer" => "Just as easy as saying, 'Hello, AddCloud!'"]
            ];

            foreach ($faqs as $faq) {
                echo '<div class="faq-item">';
                echo '<h3>' . $faq['question'] . '</h3>';
                echo '<p>' . $faq['answer'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="join-section">
        <h2>Join Us</h2>
        <p>Ready to take your business to the next level? Join us today and experience the benefits of cloud computing.</p>
        <a href="{{ url('/products') }}" class="button">Join Now</a>
    </div>
    <div class="whatsapp-button">
        <a href="https://wa.me/6281818899989" target="_blank">
            <img src="assets/img/logo_wa.png" alt="WhatsApp" style="width: 30px; height: 30px;">
        </a>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="column">
                <img src="assets/img/footer-logo.png" alt="logo" class="logo">
            </div>
            <div class="column">
                <h3>About Us</h3>
                <p>We‘re AddCloud – your go-to hub when you need more than just storage. We’ve got the cumulus of data handling!</p>
            </div>
            <div class="column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    <li><a href="{{ url('/article') }}">Article</a></li>
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="column">
                <h3>Our Location</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Krekot Bunder Raya 11A, RT/RW: 004/06 Pasar Baru, Sawah Besar - Jakarta Pusat 10710</p>
                <p><i class="fas fa-phone-alt"></i> +123 456 7890</p>
                <p><i class="fas fa-envelope"></i> addcloud@gmail.com</p>
            </div>
            <div class="column social-media">
                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>

            </div>
        </div>
        <div class="footer-bottom">
            &copy; Global Sahabat Otomasi. All rights reserved.
        </div>
    </footer>
</body>
</html>
