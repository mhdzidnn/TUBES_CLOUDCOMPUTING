<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Notification;

class TransactionController extends Controller
{
  public function showTransactionForm(Request $request)
  {
    $product = Product::find($request->product_id);
    if (!$product) {
      return redirect()->back()->with('error', 'Product not found');
    }

    $couriers = Courier::all();
    return view('transaction', [
      'product' => $product,
      'price' => $product->price,
      'couriers' => $couriers,
    ]);
  }

  public function create(Request $request)
  {
    $product = Product::find($request->product_id);
    if (!$product) {
      return redirect()->back()->with('error', 'Product not found');
    }

    $couriers = Courier::all();
    return view('transaction', [
      'product' => $product,
      'price' => $product->price,
      'couriers' => $couriers,
    ]);
  }

  public function store(Request $request)
  {
    // Validasi data transaksi
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'contact' => 'required',
      'city' => 'required',
      'address' => 'required',
      'total_price' => 'required',
      'courier_id' => 'required',
    ]);

    // Mendapatkan cart dari session
    $cart = Session::get('cart', []);

    if (empty($cart)) {
      return redirect()->back()->with('error', 'Your cart is empty');
    }

    // Konfigurasi Midtrans
    Config::$serverKey = config('midtrans.serverKey');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Hitung total harga
    $totalPrice = array_sum(array_map(function ($item) {
      return $item['price'] * $item['quantity'];
    }, $cart));
    // Buat transaksi baru untuk setiap item di cart dan simpan ke database
    try {
      $user = User::where('email', $request->email)->first();
      if (!$user) {
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => 'user123',
        ]);
      }

      // Simpan transaksi dan dapatkan ID transaksi untuk setiap item
      $transaction = Transaction::create([
        'name' => $user->name,
        'email' => $user->email,
        'user_id' => $user->id,
        'contact' => $request->contact,
        'city' => $request->city,
        'address' => $request->address,
        'total_price' => $totalPrice,
        'status' => 'PENDING',
        'courier_id' => $request->courier_id,
      ]);
      foreach ($cart as $item) {
        TransactionProduct::create([
          'transaction_id' => $transaction->id,
          'product_id' => $item['id'],
          'quantity' => $item['quantity'],
          'amount' => $item['price'] * $item['quantity'],
        ]);
      }

      // Gunakan ID transaksi pertama untuk Midtrans
      $orderId = $transaction->id;

      // Parameter untuk Midtrans
      $params = [
        'transaction_details' => [
          'order_id' => $orderId, // Menggunakan ID transaksi dari database
          'gross_amount' => $totalPrice,
        ],
      ];
      Session::forget('cart');
      // Kirim permintaan transaksi ke Midtrans
      $responseMidtrans = \Midtrans\Snap::createTransaction($params);
      $paymentUrl = $responseMidtrans->redirect_url;

      // Redirect ke URL pembayaran Midtrans
      return Redirect::to($paymentUrl);
    } catch (Exception $e) {
      // Tangani error
      return redirect()->back()->with('error', $e->getMessage());
    }
  }


  public function notificationHandler(Request $request)
  {
    Config::$serverKey = config('midtrans.serverKey');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Log request payload
    Log::info('Midtrans Notification: ', $request->all());

    try {
      // Get the JSON notification from Midtrans
      $notification = new Notification();

      $transactionStatus = $notification->transaction_status;
      $orderId = $notification->order_id;
      $fraudStatus = $notification->fraud_status;

      Log::info('Transaction Status: ' . $transactionStatus);
      Log::info('Order ID: ' . $orderId);
      Log::info('Fraud Status: ' . $fraudStatus);

      // Handle the notification based on transaction status
      switch ($transactionStatus) {
        case 'capture':
          if ($fraudStatus == 'challenge') {
            $this->updateTransactionStatus($orderId, 'challenge');
          } else if ($fraudStatus == 'accept') {
            $this->updateTransactionStatus($orderId, 'success');
          }
          break;
        case 'settlement':
          $this->updateTransactionStatus($orderId, 'settlement');
          break;
        case 'deny':
          $this->updateTransactionStatus($orderId, 'deny');
          break;
        case 'expire':
          $this->updateTransactionStatus($orderId, 'expire');
          break;
        case 'cancel':
          $this->updateTransactionStatus($orderId, 'cancel');
          break;
      }

      return response()->json(['message' => 'Notification received']);
    } catch (Exception $e) {
      Log::error('Notification Handler Error: ' . $e->getMessage());
      return response()->json(['message' => 'Notification handler error'], 500);
    }
  }


  private function updateTransactionStatus($orderId, $status)
  {
    $transaction = Transaction::find($orderId);
    if ($transaction) {
      $transaction->status = $status;
      $transaction->save();
    }
  }
  public function finish(Request $request)
  {
    // Ambil informasi dari query string Midtrans
    $orderId = $request->input('order_id');
    $statusCode = $request->input('status_code');
    $transactionStatus = $request->input('transaction_status');

    // Ambil transaksi berdasarkan order_id
    $transaction = Transaction::find($orderId);

    if (!$transaction) {
      return redirect()->route('home')->with('error', 'Transaction not found.');
    }

    // Perbarui status transaksi sesuai dengan informasi dari Midtrans
    switch ($transactionStatus) {
      case 'capture':
      case 'settlement':
        $transaction->status = 'success';
        break;
      case 'pending':
        $transaction->status = 'pending';
        break;
      case 'deny':
      case 'expire':
      case 'cancel':
        $transaction->status = 'failed';
        break;
    }

    $transaction->save();

    // Tampilkan halaman hasil transaksi
    return view('finish', [
      'transaction' => $transaction,
      'transactionStatus' => $transactionStatus,
    ]);
  }

  public function adminListTransactions()
  {
    $transactions = Transaction::all();
    return view('dashboard.transactions', compact('transactions'));
  }

  public function adminListUserTransaction()
  {
    $transactions = Transaction::where('user_id', Auth::user()->id)->get();
    return view('dashboard.transactions', compact('transactions'));
  }

  public function adminShowTransaction($id)
  {
    $transaction = Transaction::find($id);
    return view('dashboard.detail-transaction', compact('transaction'));
  }

  public function adminDestroyTransaction($id)
  {
    $transaction = Transaction::find($id);
    $transaction->delete();
    return redirect()->back()->with('success', 'Transaction deleted successfully');
  }
}
