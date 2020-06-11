<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Listing;

class ListingController extends Controller
{
    public function manageListing()
    {
        $listings = Listing::where('user_id', Auth::id())->get();

        return view('sunbnb/user/managelisting', compact('listings'));
    }
}
