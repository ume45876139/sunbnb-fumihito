<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Listing;
use Auth;

class ReservationController extends Controller
{
    public function reservation()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();

        return view('sunbnb/user/reservation', compact('reservations'));
    }

    public function trip()
    {
        $trips = Reservation::where('user_id', Auth::id())->where('is_finished')->get();

        return view('sunbnb/user/trip', compact('trips'));
    }
}
