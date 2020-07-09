<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use App\Listing;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TripController extends Controller
{
    public function trip()
    {
        $reservations = User::find(Auth::id())->listings; //decide start from id

        foreach($reservations as $reservation)
        {
            $trips = $reservation->reservations;

            return view('sunbnb/user/trip', compact('trips'));
        } 
    }
}
