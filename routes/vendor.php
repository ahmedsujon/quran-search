<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\Vendor\DashboardComponent;
use App\Http\Livewire\Auth\Vendor\LoginComponent;
use App\Http\Livewire\Auth\Vendor\RegistrationComponent;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
*/

Route::get('vendor/login', LoginComponent::class)->middleware('guest:vendor')->name('vendor.login');
Route::get('vendor/register', RegistrationComponent::class)->middleware('guest:vendor')->name('vendor.registration');


Route::prefix('vendor/')->name('vendor.')->middleware('auth:vendor')->group(function(){
    Route::post('logout', [LogoutController::class, 'vendorLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
});