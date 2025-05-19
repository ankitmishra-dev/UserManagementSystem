<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ithink-logistics', function (Request $request) {
    return 'V1: I think logistics';
})->name('ithink-logistics');
