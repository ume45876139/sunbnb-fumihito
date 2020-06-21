<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $listings = Listing::all();
        
        return view('sunbnb/search', compact('listings'));
    }

    public function userSearch(Request $request)
    {
        return view('sunbnb/user/search');
    }
}
