<script>
    function toggleMenu() {
        const menu = document.querySelector('.navbar-menu');
        menu.classList.toggle('show');
    }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roti Alit - Oleh-oleh kuningan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #0056b3; /* Warna biru elegan */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .navbar-logo .logo {
            height: 40px; /* Ukuran logo */
        }

        .navbar-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-menu li {
            margin: 0 15px;
        }

        .navbar-menu a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar-menu a:hover {
            color: #ffd700; /* Warna hover emas */
        }

        /* Tombol Menu (Responsif) */
        .menu-toggle {
            display: none;
            font-size: 24px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Responsif untuk Mobile */
        @media (max-width: 768px) {
            .navbar-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                right: 0;
                background-color: #0056b3;
                width: 100%;
                padding: 10px 0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .navbar-menu.show {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .navbar-menu li {
                margin: 10px 0;
                text-align: center;
            }
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --text-dark: #1f2937;
            --text-light: #f9fafb;
            --background-light: #f3f4f6;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
            z-index: 100;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            background-color: #20ba5a;
        }

        .whatsapp-float img {
            width: 60px;
            height: 60px;
            padding: 10px;
        }

        body {
            line-height: 1.6;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('assets/img/HalamanDepan.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--text-light);
        }

        .hero-content {
            max-width: 800px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.2s;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            animation: fadeInUp 1s ease 0.4s;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--text-light);
        }

        .btn-outline {
            border: 2px solid var(--text-light);
            color: var(--text-light);
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            background: var(--background-light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Styles for Products Section */
        .products {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .section-title h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Styles for Products Section */
        .products {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .section-title h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Membuat 4 kolom */
            gap: 20px; /* Menambah jarak antar produk */
            max-width: 1200px; /* Menyesuaikan lebar grid agar tidak terlalu besar */
            width: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px); /* Menambahkan efek naik (geser ke atas) */
        }

        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 1rem;
            text-decoration: none; /* Hilangkan garissss bawah pada link */
            color: inherit; /* Warna teks mengikuti warna normal */
            position: relative; /* Menjaga elemen di dalam posisi relatif */
            transition: transform 0.3s ease; /* Transisi efek naik */
        }

        .product-image {
            width: 100%; /* Menjaga ukuran gambar tetap konsisten */
            height: 200px; /* Tentukan tinggi tetap untuk gambar produk */
            object-fit: cover; /* Menjaga proporsi gambar tetap sesuai */
        }

        .product-card:hover .product-image {
            transform: scale(1.05); /* Memberikan efek sedikit zoom ketika hover */
        }
        .product-info h3 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .product-info p {
            font-size: 1rem;
            color: #555;
        }

        .scroll-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            font-size: 1.2rem;
        }

        .scroll-indicator i {
            margin-right: 10px;
        }



        /* Testimonials */
        .testimonials {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('assets/img/Testimonial.jpeg');
            background-size: cover;
            background-position: center;
            color: var(--text-light);
            padding: 5rem 2rem;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 1rem;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--text-light);
            padding: 4rem 2rem 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: var(--text-light);
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            color: var(--accent-color);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }
            
            .whatsapp-float img {
                width: 50px;
                height: 50px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <a href="https://wa.me/6281818899989" target="_blank" class="whatsapp-float">
        <img src="assets/img/logo_wa.png" alt="WhatsApp">
    </a>

    <nav class="navbar">
        <div class="navbar-logo">
            <a href="#">
                <img src="assets/img/logoroti.jpg" alt="Logo" class="logo">
            </a>
        </div>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <ul class="navbar-menu">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="{{ url('/products') }}" class="{{ request()->is('products') ? 'active' : '' }}">Produk</a></li>
            <li><a href="{{ url('/article') }}" class="{{ request()->is('article') ? 'active' : '' }}">Berita</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak</a></li>
            <li><a href="#toko-kami">Toko Kami</a></li>
            <li><a href="#keranjang">Keranjang</a></li>
        </ul>
    </nav>
    
    
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Selamat Datang Di Roti Alit</h1>
            <div class="cta-buttons">
                <a href="{{ url('/home') }}" class="btn btn-primary">Explore Products</a>
                <a href="{{ url('/contact') }}" class="btn btn-outline">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="section-title">
            <h2>KEUNGGULAN KAMI</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-cake-candles feature-icon"></i>
                <h3>Banyak Varian</h3>
                <p>Toko kami mempunyai lebih dari 500 varian produk yang bermacam-macam, mulai dari roti mini dan jajan pasar hingga spiku dan brownies.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-leaf feature-icon"></i>
                <h3>Bahan Terbaik & Tanpa Pengawet</h3>
                <p>Semua produk kami menggunakan bahan terbaik, berkualitas dan bebas dari berbagai macam pengawet makanan.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-dollar-sign feature-icon"></i>
                <h3>Harga Bersaing</h3>
                <p>Semua produk kami memiliki harga yang bersaing di pasaran.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-trophy feature-icon"></i>
                <h3>Meraih Penghargaan</h3>
                <p>Toko kami memenangkan beberapa penghargaan bergengsi di Indonesia seperti rekor MURI dan Jawa Pos Culinary Awards.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-book feature-icon"></i>
                <h3>Resep Kuno</h3>
                <p>Semua roti dan kue buatan kami menggunakan resep yang khas sejak tahun 1989.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-gift feature-icon"></i>
                <h3>Pesanan Khusus</h3>
                <p>Kami juga melayani pesanan khusus untuk acara keluarga, ulang tahun, kantor, pernikahan, arisan, training, dan lain-lain.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-truck feature-icon"></i>
                <h3>Pengiriman Cepat</h3>
                <p>Kami menyediakan layanan pengiriman cepat untuk memastikan produk sampai tepat waktu dalam kondisi segar.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users feature-icon"></i>
                <h3>Layanan Pelanggan Ramah</h3>
                <p>Tim layanan pelanggan kami siap membantu Anda dengan pelayanan yang ramah dan responsif setiap saat.</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <!-- Products Section -->
    <section class="products" id="products">
        <div class="section-title">
            <h2>PRODUK KAMI</h2>
        </div>
        <div class="product-container">
            <div class="product-grid">
                <!-- Product Card 1 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/jajananpasar.webp" alt="RS4021xs+" class="product-image">
                    <div class="product-info">
                        <h3>Jajan Pasar</h3>
                    </div>
                </a>
                <!-- Product Card 2 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/rolltart.webp" alt="FS3600" class="product-image">
                    <div class="product-info">
                        <h3>Roll tart</h3>
                    </div>
                </a>
                <!-- Product Card 3 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/brownies.jpeg" alt="DS1821+" class="product-image">
                    <div class="product-info">
                        <h3>Brownies</h3>
                    </div>
                </a>
                <!-- Product Card 4 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/kuepaketan.jpg" alt="DS3622xs+" class="product-image">
                    <div class="product-info">
                        <h3>Paketan</h3>
                    </div>
                </a>
                <!-- Product Card 5 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/cake.jpg" alt="DS723+" class="product-image">
                    <div class="product-info">
                        <h3>Cake</h3>
                    </div>
                </a>
                <!-- Product Card 6 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/rotimanis.webp" alt="RS422+" class="product-image">
                    <div class="product-info">
                        <h3>Roti Manis</h3>
                    </div>
                </a>
                <!-- Product Card 7 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/rotimini.avif" alt="RS422+" class="product-image">
                    <div class="product-info">
                        <h3>Roti Mini</h3>
                    </div>
                </a>
                <!-- Product Card 8 -->
                <a href="{{ url('/home') }}" class="product-card">
                    <img src="assets/img/rotitawar.png" alt="RS422+" class="product-image">
                    <div class="product-info">
                        <h3>Roti Tawar</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-arrow-right"></i>
            Scroll to see more products
        </div>
    </section>



    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="section-title">
            <h2>TESTIMONI PELANGGAN</h2>
            <p>Ini Kata Mereka Yang Pernah Mencoba Produk Roti Alit</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p>"Harga roti di sini sangat terjangkau, tapi tetap enak dan segar setiap hari. Kualitasnya tetap terbaik meski harganya bersahabat."</p>
                <h4>Hanna Safiya</h4>
                <p>Ibu Rumah Tangga</p>
            </div>
            <div class="testimonial-card">
                <p>"Roti di sini rasanya luar biasa! Cokelatnya manis, isi melimpah, dan teksturnya lembut. Seperti roti buatan rumah."</p>
                <h4>Muhammad Zidan </h4>
                <p>Karyawan</p>
            </div>
            <div class="testimonial-card">
                <p>"Kualitas roti sangat memuaskan! Lembut dan tahan lama, bahan segar, dan selalu dipanggang dengan sempurna."</p>
                <h4>Razqa</h4>
                <p>Siswa Sekolah</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>AddCloud</h3>
                <p>Your trusted partner in cloud storage solutions</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Krekot Bunder Raya 11A, Jakarta Pusat</p>
                <p><i class="fas fa-phone"></i> +62 818 1889 9989</p>
                <p><i class="fas fa-envelope"></i> addcloud@gmail.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Global Sahabat Otomasi. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>