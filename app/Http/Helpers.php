<?php

use Illuminate\Support\Facades\Auth;

//Authenticated User
function user(){
    return Auth::guard('web')->user();
}

//Authenticated Seller
function vendor(){
    return Auth::guard('vendor')->user();
}

//Authenticated Admin
function admin(){
    return Auth::guard('admin')->user();
}

function loadingStateWithText($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div> ' . $title . '
    ';

    return $loadingSpinner;
}
