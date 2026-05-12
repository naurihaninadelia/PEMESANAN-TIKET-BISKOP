<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage.index');
});

Route::get('/about', function () {
    return view('landingPage.about');
});
