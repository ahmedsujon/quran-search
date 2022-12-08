<?php

use App\Models\AyatWord;
use App\Models\SuraAyat;
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

function loadingState($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div> ' . $title . '
    ';

    return $loadingSpinner;
}

function suraAyatData($surah_number, $ayat_number){
    $data = SuraAyat::where('surah_number', $surah_number)->where('ayat_number', $ayat_number)->first();
    return $data;
}

function ayatwordData($surah_number, $ayat_number){
    $data = AyatWord::where('surah_number', $surah_number)->where('ayat_number', $ayat_number)->first();
    return $data;
}

function pregReplace($value){
    return preg_replace("~[\x{064B}-\x{065B}]~u", "", $value);
}