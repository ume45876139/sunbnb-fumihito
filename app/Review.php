<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

    public function storeReview($user, $reservation, $star, $description)
    {
        $this->author_id = Auth::id();
        $this->guest_id = $user;
        $this->reservation_id = $reservation;
        $this->star = $star;
        $this->description = $description;
        $this->save();

        return $this;
    }
}
