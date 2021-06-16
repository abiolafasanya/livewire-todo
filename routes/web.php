<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Article;

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
    return view('welcome');
});
Route::get('/movie', function () {
    return view('livewire.movie-info');
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function() {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/articles', function(){
        return view('articles');
    })->name('articles');

});

// Route::middleware(['auth:sanctum', 'verified'])->get('/article', function () {
//     return view('article');
// })->name('article');

