<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ithink-logistics', function (Request $request) {
    return response()->json([
        'message' => 'ithink-logistics v2 api',
    ]);
})->name('ithink-logistics');
