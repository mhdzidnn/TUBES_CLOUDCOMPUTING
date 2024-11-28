<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
  return view('welcome');
});



// Bagian Home
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Bagian Contact
Route::get('/contact', function () {
  return view('contact');
});
// Bagian Product
Route::get('/products', [ProductController::class, 'product']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('show');
Route::get('/products/{id}/specs', [ProductController::class, 'specs'])->name('specs');
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::post('/couriers', [CourierController::class, 'index']);
Route::get('/transaction/form', [TransactionController::class, 'showTransactionForm'])->name('transaction');
Route::get('/transaction', [TransactionController::class, 'create'])->name('transaction.form');
Route::post('/transaction', [TransactionController::class, 'store'])->name('processPayment');
Route::get('/transaction/finish', [TransactionController::class, 'finish'])->name('finish');
Route::get('/onlineshop', function () {
  return view('onlineshop');
})->name('onlineshop');
// Bagian Article
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/tech-category/{id}', [ArticleController::class, 'category'])->name('tech-category');
Route::get('/tech-single/{id}', [ArticleController::class, 'single'])->name('tech-single');
Route::get('/tech-author/{id}', [ArticleController::class, 'author'])->name('tech-author');
Route::get('/tech-category/{id}', [ArticleController::class, 'category'])->name('tech-category');
Route::get('/tech-single/{id}', [ArticleController::class, 'single'])->name('tech-single');
Route::get('/tech-single1/{id}', [ArticleController::class, 'single1'])->name('tech-single1');
Route::get('/tech-single2/{id}', [ArticleController::class, 'single2'])->name('tech-single2');
Route::get('/tech-single3/{id}', [ArticleController::class, 'single3'])->name('tech-single3');
Route::get('/tech-single4/{id}', [ArticleController::class, 'single4'])->name('tech-single4');
Route::get('/tech-single5/{id}', [ArticleController::class, 'single5'])->name('tech-single5');
Route::get('/tech-single6/{id}', [ArticleController::class, 'single6'])->name('tech-single6');
//bagian video tutorial
Route::get('/tutorial', TutorialController::class)->name('tutorial');
//bagian cart
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');



// authentication
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// admin dashboard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::prefix('dashboard')->group(function () {
  Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'adminListProducts']);
    Route::get('/add', [ProductController::class, 'adminAddProduct']);
    Route::post('', [ProductController::class, 'adminStoreProduct']);
    Route::get('/{id}', [ProductController::class, 'adminShowProduct']);
    Route::get('/{id}/edit', [ProductController::class, 'adminEditProduct']);
    Route::put('/{id}', [ProductController::class, 'adminUpdateProduct']);
    Route::delete('/{id}', [ProductController::class, 'adminDestroyProduct']);
  });

  Route::prefix('transactions')->group(function () {
    Route::get('', [TransactionController::class, 'adminListTransactions']);
    Route::get('/user', [TransactionController::class, 'adminListUserTransaction']);
    Route::get('/{id}', [TransactionController::class, 'adminShowTransaction']);
    Route::delete('/{id}', [TransactionController::class, 'adminDestroyTransaction']);
  });
});
