<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
        ];
    }

    /**
     * Get users with last purchase date.
     *
     * @return mixed
     */
    public static function usersWithLastPurchaseDate()
    {
        return self::leftJoin('purchases', 'users.id', '=', 'purchases.user_id')
            ->select('users.*', DB::raw('MAX(purchases.purchase_date) as last_purchase_date'))
            ->groupBy('users.id')
            ->get();
    }

    /**
     * Get users sorted by birthday
     *
     * @return mixed
     */
    public static function usersSortedByBirthday()
    {
        return self::select('*')
            ->orderByRaw('MONTH(birthdate), DAY(birthdate)')
            ->get();
    }

    /**
     * Get users with birthday this week
     *
     * @return mixed
     */
    public static function usersWithBirthdaysThisWeek()
    {
        $today = Carbon::now();
        $startOfWeek = $today->startOfWeek();
        $endOfWeek = $today->endOfWeek();

        return self::whereBetween(DB::raw('DATE_FORMAT(birthdate, "%m-%d")'), [$startOfWeek->format('m-d'), $endOfWeek->format('m-d')])
            ->get();
    }


    /**
     * Define the relationship with Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
