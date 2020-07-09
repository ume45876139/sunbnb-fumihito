@extends('sunbnb.user.reservemaster')
@section('reserve')
<div class="card mt-3">
    <div class="card-header">
        <h3>${{ $listing->price }}<span class="float-right">per night</span></h3>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('calculate', ['listing' => $listing]) }}" method="get">               
        <div class="card-body row">
            <div class="col-6">
                <h5>Check in</h5>
                <input class="form-control" name="checkin" type="date">
            </div> 
            <div class="col-6">
                <h5>Check out</h5>
                <input class="form-control" name="checkout" type="date">
            </div>
            <button type="submit" class="mx-auto mt-3 btn btn-primary btn-lg">Book Now</button>
        </div>
    </form>
</div>
@endsection