<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Listing;

class Reservation extends Model
{
    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
