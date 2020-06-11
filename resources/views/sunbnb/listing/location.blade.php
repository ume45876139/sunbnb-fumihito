@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
        Location
    </div>
    <div class="card-body">
        <form action="storelocation" method="POST">
            @csrf
            <h3>Address</h3>
            <div class="form-group">
                <input class="form-control" type="text" value="{{ $listing->location }}" name="location">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection