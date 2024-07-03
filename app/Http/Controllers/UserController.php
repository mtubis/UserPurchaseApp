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

    /**
     * Get users sortet by birthday
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function usersSortedByBirthday()
    {
        $users = User::usersSortedByBirthday();
        return view('users.sorted_by_birthday', compact('users'));
    }

    /**
     * Get users with birthday this week
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function usersWithBirthdaysThisWeek()
    {
        $users = User::usersWithBirthdaysThisWeek();
        return view('users.birthdays_this_week', compact('users'));
    }
}
