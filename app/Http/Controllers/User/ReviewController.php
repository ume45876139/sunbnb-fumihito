<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Reservation;

class ReviewController extends Controller
{
    public function reviewToHost(Request $request, Reservation $reservation, Review $review)
    {
        $review->storeReview($reservation->listing->user_id, $reservation->id, $request->star, $request->description);

        toastr()->success('Successfully saved!');

        return back();
    }

    public function reviewToGuest(Request $request, Review $review, Reservation $reservation, $trip)
    {
        $guest = $reservation->find($trip)->user->id;
        $review->storeReview($guest, $trip, $request->star, $request->description);

        toastr()->success('Successfully saved!');

        return back();
    }
}
