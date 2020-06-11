@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
        Upload Photo
    </div>
    <form action="storephoto" method="POST">
        @csrf

        <button input="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection