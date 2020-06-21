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
                    @if($listing->images->count() > 0)
                        <img class="card-img-top" src="{{ asset($listing->images->first()->file_location) }}" alt="Card image cap" width="170" height="120">
                    @else
                        <img class="card-img-top" src="" alt="Card image cap">
                    @endif
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