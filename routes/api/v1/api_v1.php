<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ithink-logistics', function (Request $request) {
    return response()->json([
        'message' => 'ithink-logistics v1 api',
    ]);
})->name('ithink-logistics');

Route::apiResource('users', UserController::class)->whereNumber('user');
