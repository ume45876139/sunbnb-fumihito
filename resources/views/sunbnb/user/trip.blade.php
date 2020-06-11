@extends('sunbnb.user.master')
@section('main-contents')
    <div class="col-sm-9 card">
        <h3 class="card-header ">
             Trips
        </h3>
        <table>
            @if($trips->count() <= 0)
                <p>no trip</p>
            @else
                @foreach ($trips as $trip)
                <tr>
                    {{-- card templete --}}
                    <div class="card-body border-bottom" style="width:100%;">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <img src="{{ asset('/public/a3bfe19d88f12df2fe13e955514c52fb_s.jpg') }}"　width="170px" height="120"　alt="Generic placeholder image">
                            </div>
                            <div class="text-right col-sm-6 col-md-9" style="width:100%;">
                                <h5 class="text-left mt-0">
                                    {{ $trip->listing->name }}
                                </h5>
                                <h5 class="text-left mt-0">
                                    {{ $trip->listing->user->name }}
                                </h5>
                                <a class="btn btn-primary" href="#" >Updates</a>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection