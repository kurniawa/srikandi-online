<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $user = auth()->user();
    $data = [
        'user' => $user,
    ];
    return Inertia::render('Home', $data);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('products', ProductController::class);
// Mengcover:
// Route::get('/products', 'index')->name('products.index');
// Route::get('/products/create', 'create')->name('products.create');
// Route::post('/products', 'store')->name('products.store');
// Route::post('/products/{product}', 'show')->name('products.show');
// Route::get('/products/{product}/edit', 'edit')->name('products.edit');
// Route::put('/products/{product}', 'update')->name('products.update');
// Route::delete('/products/{product}', 'destroy')->name('products.destroy');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/choose-category', 'chooseCategory')->name('products.choose-category');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
