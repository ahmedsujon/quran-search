<?php

use App\Http\Controllers\CSVChunkController;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\Admin\Author\AdminComponent as AuthorAdminComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\Profile\ProfileComponent;

use App\Http\Livewire\Admin\SocialLink\SocialLinkComponent;
use App\Http\Livewire\Admin\Tools\CsvChunkComponent;
use App\Http\Livewire\Admin\WebsiteSetup\FooterSectionComponent;
use App\Http\Livewire\Admin\WebsiteSetup\HeaderSectionComponent;
use App\Http\Livewire\Auth\Admin\LoginComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');


Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function(){
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
    
    // Profile Routes
    Route::get('profile', ProfileComponent::class)->name('profile');

    // Website Settings Routes
    Route::get('header-settings', HeaderSectionComponent::class)->name('header.settings');
    Route::get('footer-settings', FooterSectionComponent::class)->name('footer.settings');

    // Admin Routes
    Route::get('management/admins', AuthorAdminComponent::class)->name('adminManagement');

    // Social link Routes
    Route::get('social-link', SocialLinkComponent::class)->name('social.link');
    Route::get('list', AuthorAdminComponent::class)->name('adminlist');
    
    // Tools Routes
    Route::get('tools/csv-chunk', CsvChunkComponent::class)->name('chunkCSV');
    Route::post('tools/csv-chunk/chunk', [CSVChunkController::class, 'chunkCSV'])->name('chunkCSVPost');
});