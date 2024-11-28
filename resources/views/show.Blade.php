@extends('layouts.app')

@section('title', $detailProduct->name)

@section('content')
<div class="availability-section">
    <div class="text">
        <h2>Solution for high availability</h2>
        <p>Back up your Windows PCs, Mac devices, and Microsoft OneDrive data to the cloud and never lose a file again.</p>
    </div>
    <img src="{{ asset('assets/img/availability.png') }}" alt="High Availability">
</div>


<div class="product-header">
    <div class="product-title">
        <h1>{{ $detailProduct->name }}</h1>
        <p>Versatile data management platform for work and more</p>
    </div>
    <div class="product-image">
        <img src="{{ asset('storage/' . $detailProduct->image) }}" alt="{{ $detailProduct->name }}">
    </div>
</div>


<div class="product-navigation">
    <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="{{ route('specs', $detailProduct->id) }}">Specs</a></li>
    </ul>
</div>


<div class="features-section">
    <h2>Protect your data at all times</h2>
    <p>Menggabungkan dan mencadangkan seluruh data digital Anda ke dalam satu platform. Melindungi dari serangan ransomware dan ancaman lainnya, serta memulihkan data penting dengan cepat jika terjadi penghapusan atau kehilangan tidak sengaja, guna memastikan kelangsungan bisnis.</p>
    <div class="features-list">
        @php
        $features = [
            ["img" => "Privately.jpeg", "title" => "Safety and Privately Data Share", "desc" => "Add Cloud menjamin keamanan dan privasi data Anda saat berbagi akses dengan orang lain"],
            ["img" => "EasySave.jpeg", "title" => "Easy to Save & Share Data", "desc" => "Add Cloud memungkinkan penyimpanan dan berbagi data dengan cepat dan mudah"],
            ["img" => "PortableFast.jpeg", "title" => "Portable and Fast", "desc" => "Solusi portabel yang memberikan akses cepat ke data Anda dari mana saja"],
            ["img" => "CentralizedStorage.jpeg", "title" => "Centralized Storage", "desc" => "Menyediakan penyimpanan terpusat untuk pengelolaan data yang efisien"],
            ["img" => "ExpandStorage.jpeg", "title" => "Expand and Manage Storage", "desc" => "Add Cloud memungkinkan Anda untuk memperluas dan mengelola kapasitas penyimpanan sesuai kebutuhan"]
        ];
        @endphp
        
        @foreach ($features as $feature)
            <div class="feature-item">
                <img src="{{ asset('assets/img/' . $feature['img']) }}" alt="{{ $feature['title'] }}">
                <h3>{{ $feature['title'] }}</h3>
                <p>{{ $feature['desc'] }}</p>
            </div>
        @endforeach
    </div>

    
</div>
<div class="product-features">
    @foreach($description as $title => $feature)
        <div class="product-section">
            <div class="product-image">
                <img src="{{ asset('assets/img/' . $feature['img']) }}" alt="{{ $title }}">
            </div>
            <div class="product-description">
                <h3>{{ $title }}</h3>
                <p>{{ $feature['desc'] }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
