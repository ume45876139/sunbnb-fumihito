<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Reservation;
use App\Listing;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phonenumber', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function listings()
    {
        return $this->hasMany('App\listing');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }
    
    public function gravatar()
    {
        $hash = md5(strtolower(trim('jeremiah.caballero.jc@gmail.com')));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function account()
    {
        return $this->hasOne('App\SocialAccount');
    }
}
