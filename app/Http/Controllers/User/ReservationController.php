<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Listing;
use Carbon\Carbon;
use App\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Geocoder\Facades\Geocoder;
use App\Review;
use App\User;

class ReservationController extends Controller
{
    public function reservation()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();

        return view('sunbnb/user/reservation', compact('reservations'));
    }

    public function reserve(Listing $listing, User $user) //pass class to view
    {
        $geocode = Geocoder::getAddressForCoordinates($listing->latitude, $listing->longitude);

        $reviews = $listing->reviews;

        if($reviews->count() !== 0)
        {
            $avg = round($reviews->sum('star')/$reviews->count()); // array sum
        }

        return view('sunbnb/user/reserve', compact('listing', 'geocode', 'reviews', 'avg', 'user'));
    }

    public function calculate(Request $request, Listing $listing)
    {
        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date',
        ]);
        $startDate = new Carbon($request->checkin);
        $endDate = new Carbon($request->checkout);
        $night = $startDate->diffInDays($endDate);
        $sumPrice = $night*$listing->price;

        return view('sunbnb/user/book', compact('sumPrice', 'night', 'request', 'listing'));
    }

    public function storeReservation(Request $request, Listing $listing, Reservation $reservation)
    {
        $checkin = new Carbon($request->checkin);
        $checkout = new Carbon($request->checkout);
        $reservation->saveReservation($listing->id, $checkin, $checkout, $request->total);
        toastr()->success('Successfully Reserved!');

        return redirect()->route('reserve', ['listing' => $listing]);
    }
}
