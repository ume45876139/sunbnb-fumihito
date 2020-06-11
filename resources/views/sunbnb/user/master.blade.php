@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-3">

            @if(Route::current()->getName() == 'managelisting')
                <p>Your Listings</p>
            @else
                <p><a href="{{route ('managelisting')}}">Your Listings</a></p>
            @endif

            @if(Route::current()->getName() == 'reservation')
                <p>Your Reservations</p>
            @else
                <p><a href="/sunbnb/user/reservation">Your Reservations</a></p>
            @endif

            @if(Route::current()->getName() == 'trip')
                <p>Your Trips</p>
            @else
                <p><a href="/sunbnb/user/trip">Your Trips</a></p>
            @endif
        </div>
        @yield('main-contents')
    </div>
</div>
@endsection
