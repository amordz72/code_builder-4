<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/post', App\Http\Livewire\Test\Bs\Post\All::class)->name('post_bs');


Route::get('/post_tw', App\Http\Livewire\Test\Post\All::class)->name('post_tw');
Route::get('/model_post_c', App\Http\Livewire\Test\Post\CreateModel::class)->name('model_post_c');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


require_once ('code.php') ;
