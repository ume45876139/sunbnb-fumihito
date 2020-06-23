@extends('sunbnb.user.master')
@section('main-contents')
<div class="col-sm-9 card">
     <h3 class="card-header ">
        Listings
    </h3>
    <table>
        @foreach ($listings as $listing)
        <tr>
            {{-- card templete --}}
            <div class="card-body border-bottom" style="width:100%;">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <img src="{{ asset($listing->images->first()->file_location) }}"　width="170px" height="120"　alt="Generic placeholder image">
                    </div>
                    <div class="text-right col-sm-6 col-md-9" style="width:100%;">
                        <h5 class="text-left mt-0">{{ $listing->name }}</h5>
                        <a class="btn btn-primary" href="{{ route('listing',['listing' => $listing]) }}">Updates</a>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </table>
</div>
@endsection