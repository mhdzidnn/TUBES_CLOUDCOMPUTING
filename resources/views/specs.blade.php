@extends('layouts.app')

@section('title', $product['name'] . ' - Specs')

@section('content')
<div class="availability-section">
    <div class="text">
        <h2>Solution for high availability</h2>
        <p>Back up your Windows PCs, Mac devices, and Microsoft OneDrive data to the cloud and never lose a file again.</p>
    </div>
    <img src="{{ asset('storage/'.$product->image) }}" alt="High Availability">
</div>

<div class="product-header">
    <div class="product-title">
        <h1>{{ $product->name }}</h1>
        <p>Versatile data management platform for work and more</p>
    </div>
    <div class="product-image">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}">
    </div>
</div>

<div class="product-navigation">
    <ul>
        <li><a href="{{ route('show', $product->id) }}">Features</a></li>
        <li><a href="#specs">Specs</a></li>
    </ul>
</div>

<div class="specs-section">
    <h2>Full Specifications</h2>
    <table class="specs-table">
        @foreach($specs as $key => $spec)
        <tr>
            <th>{{$key}}</th>
            <td>{{ $spec }}</td>
        </tr>
        @endforeach

    </table>
    <p class="note">{{ $specs['Note'] }}</p>
</div>

<div class="cart-button-container">
    <form action="{{ route('transaction') }}" method="get">
        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
        @csrf
        <button type="submit" class="btn btn-primary" id="addToCartBtn">Buy</button>
    </form>
</div>
@endsection
