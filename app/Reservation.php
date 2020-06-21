<?php

namespace App;

use App\Listing;
use Auth;
use Illuminate\Database\Eloquent\Model;

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

    public function saveReservation($listing, $startDate, $endDate, $total)
    {
        $this->user_id = Auth::id();
        $this->listing_id = $listing;
        $this->start_date = $startDate;
        $this->end_date = $endDate;
        $this->total = $total;
        $this->save();

        return $this;
    }
}
