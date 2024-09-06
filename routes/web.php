<?php

use App\Http\Controllers\ItemController;
use Inertia\Inertia;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/items');
});


Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('/assign-items', [ItemController::class, 'assignWishLists'])->name('assignItems');
Route::delete('/unassign-item/{item_id}/{wish_list_id}',[ItemController::class, 'removeWishList'])->name('unAssignItem');

// Route::post('/wishlist-change-status/{id}', [WishlistController::class, 'changeWishlistStatus'])->name('wishlistDetails');
Route::get('/wishlist-details', [WishlistController::class, 'getWishlistDetails'])->name('wishlistDetails');
Route::resource('wishlist', WishlistController::class);

require __DIR__.'/auth.php';
