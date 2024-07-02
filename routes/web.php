<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/last-purchase-date', [UserController::class, 'usersWithLastPurchaseDate']);

