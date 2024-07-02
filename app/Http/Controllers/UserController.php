<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Get users with last purchase date.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function usersWithLastPurchaseDate()
    {
        $users = User::usersWithLastPurchaseDate();
        return view('users.last_purchase_date', compact('users'));
    }
}
