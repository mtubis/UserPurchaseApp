<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/users/last-purchase-date', [UserController::class, 'usersWithLastPurchaseDate'])->name('users.last_purchase_date');
Route::get('/users/sorted-by-birthday', [UserController::class, 'usersSortedByBirthday'])->name('users.sorted_by_birthday');
Route::get('/users/birthdays-this-week', [UserController::class, 'usersWithBirthdaysThisWeek'])->name('users.birthdays_this_week');

