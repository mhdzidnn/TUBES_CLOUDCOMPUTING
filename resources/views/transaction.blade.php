@section('content')
@extends('layouts.app')

@section('title', 'Transaction')

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
        <li><a href="#transaction">Transaction</a></li>
        <li><a href="{{ route('onlineshop') }}">OnlineShop</a></li>
    </ul>
</div>

<div class="transaction-section">
    <div class="transaction-header">
        <h1>{{ $product->name }}</h1>
        <p class="price">Rp {{ number_format($price, 0, ',', '.') }}</p>
    </div>

    <form action="{{ route('cart.add') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
        </div>
        <button type="submit" class="btn btn-success">Add to Cart</button>
    </form>

    {{-- <form action="{{ route('processPayment') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}" />
        <input type="hidden" name="total_price" value="{{$price}}" />
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact">No. Kontak</label>
            <input type="text" name="contact" id="contact" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">Kota</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="courier_id">Kurir</label>
            <select id="courier_id" name="courier_id" style="padding: 6px;border-color: #777777;">
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}">{{$courier->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Proses ke Pembayaran</button>
    </form> --}}
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const cardDetails = document.getElementById('card-details');

        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                if (this.value === 'credit_card') {
                    cardDetails.style.display = 'block';
                } else {
                    cardDetails.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection


