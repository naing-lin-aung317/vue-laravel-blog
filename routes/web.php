<?php

use App\Http\Controllers\BlogController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.create');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blogs/{blog}/update', [BlogController::class, 'update'])->name('blogs.update');
Route::post('/blogs/{blog}/delete', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::get('/users/{user}', function (User $user) {
    return inertia('Blogs', [
        'user' => $user->load('nrc'),
        'blogs' => $user->blogs()->with('user')->latest()->get(),
    ]);
})->name('users.blogs');

require __DIR__.'/settings.php';
