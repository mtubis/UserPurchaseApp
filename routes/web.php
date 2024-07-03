<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/users/last-purchase-date', [UserController::class, 'usersWithLastPurchaseDate']);

Route::get('/users/sorted-by-birthday', [UserController::class, 'usersSortedByBirthday']);

Route::get('/users/birthdays-this-week', [UserController::class, 'usersWithBirthdaysThisWeek']);

