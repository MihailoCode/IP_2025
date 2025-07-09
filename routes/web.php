<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisnikController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/korisnici', [KorisnikController::class, 'listAllKorisniks'])->middleware("basicauth");
