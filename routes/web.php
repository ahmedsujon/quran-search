<?php

use App\Http\Livewire\App\ArabicSearch\SinglWordSeachComponent;
use App\Http\Livewire\App\IndexComponent;
use App\Http\Livewire\App\SearchListComponent;
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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', IndexComponent::class)->name('website');
Route::get('/search-list', SearchListComponent::class)->name('search-list');

// Arabic Search Routes
Route::get('/single-word-search', SinglWordSeachComponent::class)->name('single-word-search');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
