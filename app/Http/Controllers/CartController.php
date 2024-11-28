<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Courier;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = Session::get('cart', []);
        $totalPrice = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        $couriers = Courier::all();

        return view('cart', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'couriers' => $couriers,
        ]);
    }

    public function store(Request $request)
    {
        // Validate and store transaction data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'city' => 'required',
            'address' => 'required',
            'total_price' => 'required',
            'courier_id' => 'required',
            'product_id' => 'required',
        ]);

        // payment gateway
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transaction = Transaction::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'city' => $request->city,
            'address' => $request->address,
            'total_price' => $request->total_price,
            'status' => 'PENDING',
            'courier_id' => $request->courier_id,
            'product_id' => $request->product_id,
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $request->total_price,
            ]
        ];

        try {
            $responseMidtrans = \Midtrans\Snap::createTransaction($params);
            $paymentUrl = $responseMidtrans->redirect_url;
            return Redirect::to($paymentUrl);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Product added to cart');
    }


    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);
        unset($cart[$request->product_id]);
        Session::put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Product removed from cart');
    }
}
