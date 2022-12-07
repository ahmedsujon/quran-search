<?php

use App\Http\Livewire\Admin\DropdownSearch\SubjectCategoryComponent;
use App\Http\Livewire\App\ArabicSearch\DisplayQuraComponent;
use App\Http\Livewire\App\ArabicSearch\MultipleWordAndSeachComponent;
use App\Http\Livewire\App\ArabicSearch\MultipleWordOrSeachComponent;
use App\Http\Livewire\App\ArabicSearch\SinglWordSeachComponent;
use App\Http\Livewire\App\DropdownSearch\SubjectCategoryComponent as DropdownSearchSubjectCategoryComponent;
use App\Http\Livewire\App\EnglishSearch\DisplayEnglishSubCategoryComponent;
use App\Http\Livewire\App\EnglishSearch\DisplayEnglishWordComponent;
use App\Http\Livewire\App\EnglishSearch\DropdownSearchComponent;
use App\Http\Livewire\App\EnglishSearch\EnglisWordSearchComponent;
use App\Http\Livewire\App\EnglishSearch\TransliterationComponent;
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
Route::get('/multiple-word-or-search', MultipleWordOrSeachComponent::class)->name('multiple-word-or-search');
Route::get('/multiple-word-and-search', MultipleWordAndSeachComponent::class)->name('multiple-word-and-search');
Route::get('/display-quran-arabic', DisplayQuraComponent::class)->name('display-quran-arabic');

// English Search Routes
Route::get('/quran-word-transliteration', TransliterationComponent::class)->name('quran-word-transliteration');
Route::get('/english-word-search', EnglisWordSearchComponent::class)->name('english-word-search');
Route::get('/display-subject-category-word', DisplayEnglishWordComponent::class)->name('display-subject-category-word');
Route::get('/display-subsubject-category-word', DisplayEnglishSubCategoryComponent::class)->name('display-subsubject-category-word');

// Dropdown Search Routes
Route::get('/dropdown-search', DropdownSearchComponent::class)->name('dropdown-search');
Route::get('/subject-dropdown-search', DropdownSearchSubjectCategoryComponent::class)->name('subject-dropdown-search');




//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
