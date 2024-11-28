@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="availability-section">
    <div class="slider">
        <div class="slide">
            <div class="text">
                <h2>Solution for high availability</h2>
                <p>Back up your Windows PCs, Mac devices, and Microsoft OneDrive data to the cloud and never lose a file again.</p>
            </div>
            <img src="{{ asset('assets/img/availability.png') }}" alt="High Availability">
        </div>
        <div class="slide">
            <div class="text">
                <h2>Reliable Data Backup</h2>
                <p>Ensure your important data is always safe with our reliable cloud backup solutions.</p>
            </div>
            <img src="{{ asset('assets/img/CrossPlatformSharing.png') }}" alt="Data Backup">
        </div>
        <!-- Tambahkan slide lain sesuai kebutuhan -->
    </div>
    <div class="slider-controls">
        <button class="prev">&laquo; Previous</button>
        <button class="next">Next &raquo;</button>
    </div>
</div>
    <div class="about-section">
        <img src="{{ asset('assets/img/about-us.jpg') }}" alt="About Us">
        <div class="text">
            <h2>About Us</h2>
            <ul>
                <li>
                    <span>1</span>
                    <div>
                        <strong>WHO WE ARE / BACKGROUND</strong>
                        <p>We are PT Global Sahabat Otomasi, an engineering company which specializes in Machine Vision and Control. Established by an expert team, who have success in engineering field. They provide a solution base on field case. PT Global Sahabat Otomasi has quickly gained trust from multinational company due their performance in supporting and providing solution for the user.</p>
                    </div>
                </li>
                <li>
                    <span>2</span>
                    <div>
                        <strong>VISION & MISSION</strong>
                        <p>To be the best provider of automation solution in the world and be a Partner for your automation's problem.</p>
                    </div>
                </li>
                <li>
                    <span>3</span>
                    <div>
                        <strong>INDUSTRY 4.0</strong>
                        <p>PT Global Sahabat Otomasi come with paperless solution for every factory, customer also can monitoring their machine through our web based software that already integrated with cloud server so can monitor status of machine and OEE (smart manufacturing). This a new phase in the Industrial Revolution that focuses heavily on interconnectivity, automation, machine learning, and real-time data.</p>
                    </div>
                </li>
                <li>
                    <span>4</span>
                    <div>
                        <strong>ARTIFICIAL INTELLIGENT (AI) VISION</strong>
                        <p>PT Global Sahabat Otomasi has identified very specific needs concerning machine vision systems; as a general tendency, many industries require new vision systems to be adaptive, so that they can be quickly repurposed to inspect new products. Artificial intelligence and statistical inference are the keywords for an easy, fast and reliable approach to the most recent challenges of the Machine Vision world.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="growth-section">
        <h2>BOOST BUSINESS GROWTH WITH ADDCLOUD CLOUD SOLUTIONS</h2>
        <div class="phones">
            <div class="phone">
                <img src="{{ asset('assets/img/phone1.png') }}" alt="Safety & Easy to Save">
                <p>Safety & Easy to Save</p>
            </div>
            <div class="phone">
                <img src="{{ asset('assets/img/phone2.png') }}" alt="Centralized Storage">
                <p>Centralized Storage</p>
            </div>
            <div class="phone">
                <img src="{{ asset('assets/img/phone3.png') }}" alt="Portable & Fast">
                <p>Portable & Fast</p>
            </div>
        </div>
    </div>

    <div class="fifth-section">
        <h2>ADDCLOUD: SOLUSI PENYIMPANAN DATA TERBAIK UNTUK BISNIS ANDA</h2>
        <p>Di era digital yang serba cepat, memiliki solusi penyimpanan data yang handal dan efisien adalah kunci untuk menjalankan bisnis dengan lancar. AddCloud menawarkan solusi penyimpanan data skala besar dengan performa tinggi dan keamanan superior. Dengan AddCloud, data Anda dapat diakses dengan cepat dan responsif, di mana saja dan kapan saja.</p>
        <p>Tidak hanya itu, AddCloud juga menawarkan fleksibilitas yang luar biasa, memungkinkan Anda untuk meningkatkan atau menurunkan kapasitas penyimpanan sesuai kebutuhan bisnis Anda tanpa perlu downtime yang signifikan. Keamanan fisik dan digital yang kami tawarkan memastikan data Anda selalu terlindungi dari ancaman.</p>
        <p>Mulai transformasi digital Anda dengan AddCloud sekarang dan rasakan perbedaannya dalam efisiensi operasional dan produktivitas bisnis.</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;
            let currentIndex = 0;

            const showSlide = (index) => {
                const slider = document.querySelector('.slider');
                slider.style.transform = `translateX(-${index * 100}%)`;
            };

            const nextSlide = () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            };

            const prevSlide = () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                showSlide(currentIndex);
            };

            document.querySelector('.next').addEventListener('click', nextSlide);
            document.querySelector('.prev').addEventListener('click', prevSlide);

            // Optional: Auto-slide functionality
            setInterval(nextSlide, 5000); // Change slides every 5 seconds
        });
    </script>
@endsection
