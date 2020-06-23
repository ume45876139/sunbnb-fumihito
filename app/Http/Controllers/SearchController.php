<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        return view('sunbnb/search');
    }

    public function userSearch(Request $request)
    {
        return view('sunbnb/user/search');
    }
}
