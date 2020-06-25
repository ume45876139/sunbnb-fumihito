<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');
        $listings = Listing::where('name', 'summary', '%'.$search.'%')->get();       
        return view('sunbnb/search', compact('listings'));
    }
}
