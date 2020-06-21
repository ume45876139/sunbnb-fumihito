@extends('sunbnb.user.master')
@section('main-contents')
    <div class="col-sm-9 card">
        <h3 class="card-header">
             Reservations
        </h3>
        <table>
            @if($reservations === null)
                <p>no reservation</p>
            @else
                @foreach ($reservations as $reservation)
                <tr>
                    {{-- card templete --}}
                    <div class="card-body border-bottom" style="width:100%;">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <p>{{ $reservation->start_date }}</p>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                @if($reservation->listing->images->count() > 0)
                                    <img class="card-img-top" src="{{ asset($reservation->listing->images->first()->file_location) }}" alt="Card image cap" width="170" height="120">
                                @else
                                    <img class="card-img-top" src="" alt="Card image cap">
                                @endif
                            </div>
                            <div class="text-right col-sm-3 col-md-7" style="width:100%;">
                                <h5 class="text-left mt-0">
                                    {{ $reservation->listing->name }}
                                </h5>
                                <h5 class="text-left mt-0">
                                    {{ $reservation->listing->user->name }}
                                </h5>
                                <a class="btn btn-primary" href="#" >Review</a>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection