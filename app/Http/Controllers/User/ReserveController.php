<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function reserve()
    {
        return view('sunbnb/user/reserve');
    }
}
