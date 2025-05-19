<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ithink-logistics', function (Request $request) {
    return 'V1: I think logistics';
})->name('ithink-logistics');

Route::apiResource('users', UserController::class)->middleware('force.json.response');
