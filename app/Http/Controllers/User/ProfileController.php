<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = User::find(Auth::id());
        return view('sunbnb/user/editprofile', compact('user'));
    }

    public function profile()
    {
        return view('sunbnb/user/profile');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'phonenumber' => 'integer',
            'description' => 'string'
        ]);

        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'description' => $request->description
        ]);

        if($request->password !== null && $request->password == Auth::user()->password)
        {
            User::where('id', Auth::id())->update([
                'password' => $request->password
            ]);
            //toastr
            return back();
        }

        return back();
    }
}
