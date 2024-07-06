<?php

use App\Http\Controllers\Admin\AuthController;
use App\Livewire\AboutPage;
use App\Livewire\ArticleDetailsPage;
use App\Livewire\ArticleGridPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailsPage;
use App\Livewire\ProfilePage;
use App\Livewire\ShopPage;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/articleGrid', ArticleGridPage::class)->name('articleGrid');
Route::get('/shop', ShopPage::class)->name('shop');
Route::get('/categories', CategoriesPage::class)->name('categories');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/home1', HomePage::class)->name('dashboard');
    Route::get('/productDetails', ProductDetailsPage::class)->name('productDetails');
    Route::get('/profile', ProfilePage::class)->name('profile');
    Route::get('/cart', CartPage::class)->name('cart');
    Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/articleDetails', ArticleDetailsPage::class)->name('articleDetails');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});
