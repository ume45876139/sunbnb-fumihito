<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');
        $listings = Listing::where('name', 'like', '%'.$search.'%')
        ->orwhere('address', 'like', '%'.$search.'%')
        ->orwhere('summary', 'like', '%'.$search.'%')
        ->get(); // like
        
        return view('sunbnb/search', compact('listings'));
    }
}
