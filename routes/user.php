<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\User\DashboardComponent;
use App\Http\Livewire\Auth\User\LoginComponent;
use App\Http\Livewire\Auth\User\RegistrationComponent;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('login', LoginComponent::class)->middleware('guest')->name('login');
Route::get('register', RegistrationComponent::class)->middleware('guest')->name('register');


Route::prefix('user/')->name('user.')->middleware('auth')->group(function(){
    Route::post('logout', [LogoutController::class, 'userLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
});