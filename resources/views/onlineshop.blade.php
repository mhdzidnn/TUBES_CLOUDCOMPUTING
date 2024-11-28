@section('content')
@extends('layouts.app')

@section('title', 'onlineshop')

@section('content')
<div class="availability-section">
    <div class="text">
        <h2>Solution for high availability</h2>
        <p>Back up your Windows PCs, Mac devices, and Microsoft OneDrive data to the cloud and never lose a file again.</p>
    </div>
    <img src="{{ asset('assets/img/availability.png') }}" alt="High Availability">
</div>
<div class="product-navigation">
    <ul>
        <li><a href="{{ route('transaction') }}">Transaction</a></li>
        <li><a href="#onlineshop">OnlineShop</a></li>
    </ul>
</div>

<div class="container">
    <div class="card">
        <a href="https://shop.tiktok.com" target="_blank">
            <img src="{{ asset('assets/img/Tiktokshop.png') }}" alt="Bhinneka Logo">
            <h2>Tiktok Shop</h2>
            <p>Website</p>
        </a>
    </div>

    <div class="card">
        <a href="https://www.shopee.co.id" target="_blank">
            <img src="{{ asset('assets/img/shopee.jpg') }}" alt="Shopee Logo">
            <h2>Shopee Indonesia</h2>
            <p>Website</p>
        </a>
    </div>
    
    <div class="card">
        <a href="https://www.tokopedia.com" target="_blank">
            <img src="{{ asset('assets/img/tokopedia.jpg') }}" alt="Tokopedia Logo">
            <h2>Tokopedia</h2>
            <p>Website</p>
        </a>
    </div>
</div>
@endsection
