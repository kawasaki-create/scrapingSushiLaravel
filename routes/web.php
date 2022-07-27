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
    $names = $crawler->filter('.c_l-content .ttl')->each(function ($node) {
        return [
            'name' => $node->text(),
            'price' => '11',
            'url' => ''
        ];
    });
    DB::table('api')->insert($names);

    return view('scraping');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');