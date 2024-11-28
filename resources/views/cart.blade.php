@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp {{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                <td colspan="2">Rp {{ number_format($totalPrice, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <h2 class="mt-4">Shipping Information</h2>
    <form action="{{ route('processPayment') }}" method="post">
        @csrf
        @foreach($cart as $item)
            <input type="hidden" name="product_ids[]" value="{{ $item['id'] }}" />
            <input type="hidden" name="quantities[]" value="{{ $item['quantity'] }}" />
        @endforeach
        <input type="hidden" name="total_price" value="{{ $totalPrice }}" />

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
            <select id="courier_id" name="courier_id" class="form-control" required>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    </form>
</div>
@endsection
