@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="catalog-section">
    @foreach($productsCategory as $category => $products)
    <div class="catalog-category">
        <h2>{{ $category }}</h2>
        <p>{{ $products['description'] }}</p>
        <div class="product-grid">
            @foreach($products['products'] as $product)
            <div class="product-item">
                <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
                <h3><a href="{{ route('show', $product->id) }}">{{ $product->name }}</a></h3>
                @foreach(json_decode($product->description) as $spec)
                <p>{{ $spec }}</p>
                @endforeach

                <!-- Form untuk tombol "Buy" -->
                <div class="cart-button-container">
                    <form action="{{ route('transaction') }}" method="get">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @csrf
                        <button type="submit" class="btn btn-primary" id="addToCartBtn">Buy</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
