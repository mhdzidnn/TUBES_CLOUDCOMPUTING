<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    {{-- <link href="css/bootstrap.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- FontAwesome Icons core CSS -->
    {{-- <link href="css/font-awesome.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Responsive styles for this template -->
    {{-- <link href="css/responsive.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Colors for this template -->
    {{-- <link href="css/colors.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}">
    <!-- Version Tech CSS for this template -->
    {{-- <link href="css/version/tech.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/version/tech.css') }}">

</head>
<body>
    <div class="header">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Global" height="50">
        <div class="nav">
            <a href="{{ url('/home') }}" class="{{ request()->is('home') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/products') }}" class="{{ request()->is('products') ? 'active' : '' }}">Product</a>
            <a href="{{ url('/article') }}" class="{{ request()->is('article') ? 'active' : '' }}">Article</a>
            <a href="{{ url('/tutorial') }}" class="{{ request()->is('tutorial') ? 'active' : '' }}">Tutorial</a>
            <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
            <a href="{{ url('/login') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Login</a>
        </div>
    </div>

    @yield('content')
    <footer class="footer">
        <div class="footer-content">
            <div class="column">
                <img src="{{ asset('assets/img/footer-logo.png') }}" alt="logo" class="logo">
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
    <div class="whatsapp-button">
        <a href="https://wa.me/6281818899989" target="_blank">
            <img src="{{ asset('assets/img/logo_wa.png') }}" alt="WhatsApp" style="width: 30px; height: 30px;">
        </a>
    </div>

</body>
</html>
