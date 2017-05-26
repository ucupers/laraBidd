<?php

namespace auctionTime;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function bestUsers()
    {
        return DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->groupBy('users.name', 'users.id')
            ->select('users.name', 'users.id', DB::raw('count(*) as products'))
            ->orderBy('products', 'desc')
            ->get();
    }

    public function bids()
    {
        return $this->hasMany(Bid::class)->orderBy('created_at', 'DESC');
    }

    public static function userShow(User $user)
    {
        return DB::table('products')
            ->where('user_id', '=', $user->id)
            ->get();
    }


}
