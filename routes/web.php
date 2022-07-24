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

Route::get('/', function() {

    return view('welcome');
});

Route::get('/scraping_page', function() {
    $crawler = Goutte::request('GET', 'https://www.akindo-sushiro.co.jp/menu/');
    $crawler->filter('.c_l-content .ttl')->each(function ($node) {
      dump($node->text());
    });
    return view('scraping');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');