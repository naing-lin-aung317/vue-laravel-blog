<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
   
});
Route::get('/blogs',function(){
    
    return inertia('Blogs',[
        'blogs'=>Blog::latest()->get(
        ) ]);
})->name('blogs');

Route::get('/blogs/{blog}',function(Blog $blog){
    
    return inertia('BlogShow',[
        'blog'=> $blog
    ]);
})->name('abc');

require __DIR__.'/settings.php';
