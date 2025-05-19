<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ithink-logistics', function (Request $request) {
    return 'V1: I think logistics';
})->name('ithink-logistics');

// middleware (ForceJsonResponse::class) | Not using as of now as in get request the 404 page in returned before acual midleware call gets entered
Route::apiResource('users', UserController::class);
