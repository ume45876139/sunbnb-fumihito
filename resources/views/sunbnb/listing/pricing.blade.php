@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
    Input Price
    </div>
    <div class="card-body">
        <form action="storeprice" method="POST">
            @csrf
            <h3>Price</h3>
            <div class="form-group">
                <input class="form-control" type="text" name="price" value="{{ $listing->price }}" placeholder="$">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection