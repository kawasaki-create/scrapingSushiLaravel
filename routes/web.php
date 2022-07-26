<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    $url = 'https://www.akindo-sushiro.co.jp/menu/';
    $crawler = Goutte::request('GET', $url);
    $price = $crawler->filter('.c_l-content .price');
    $names = $crawler->filter('.c_l-content .ttl')->each(function ($node) {
        return [
            'name' => $node->text(),
            'price' => $price,
            'url' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    });
    DB::table('api')->insert($names);
    return view('scraping');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');