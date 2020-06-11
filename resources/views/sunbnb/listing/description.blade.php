@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
    Create Your Beautiful Place
    </div>
    <div class="card-body">
        <form action="storedescription" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $listing->name }}" placeholder="house name">
            </div>
            <div class="form-group">
                <textarea name="description" rows="6" class="form-control" placeholder="Description">{{ $listing->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
