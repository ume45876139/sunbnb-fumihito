@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4">
            <div class="col-sm-3">
                <div class="border-bottom">
                    {{-- condition of current page --}}
                    @if(Route::current()->getName() == 'listing')
                        <p>Your Listings</p>
                    @else
                        <p><a href="{{ route('listing',['listing' => $listing]) }}">Listings</a></p>
                    @endif

                    @if(Route::current()->getName() == 'pricing')
                        <p>Pricing</p>
                    @else
                        <p><a href="{{ route('pricing', ['listing' => $listing]) }}" >Pricing</a></p>
                    @endif

                    @if(Route::current()->getName() == 'description')
                        <p>Description</p>
                    @else
                        <p><a href="{{ route('description', ['listing' => $listing]) }}">Description</a></p>
                    @endif

                    @if(Route::current()->getName() == 'photo')
                        <p>Photos</p>
                    @else
                        <p><a href="{{ route('photo', ['listing' => $listing]) }}">Photos</a></p>
                    @endif

                    @if(Route::current()->getName() == 'amenities')
                        <p>Amenities</p>
                    @else
                        <p><a href="{{ route('amenities', ['listing' => $listing]) }}">Amenities</a></p>
                    @endif

                    @if(Route::current()->getName() == 'location')
                        <p>Location</p>
                    @else
                        <p><a href="{{ route('location', ['listing' => $listing]) }}">Location</a></p>
                    @endif
                </div>
                <form action="publish" method="POST">
                    @csrf
                    <input type="hidden" name="is_published" value="1">
                    <button type="submit" class="mt-3 btn btn-primary">Publish</button>
                </form>
            </div>
        @yield('main-contents')
    </div>
</div>
@endsection