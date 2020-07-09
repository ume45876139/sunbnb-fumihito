@extends('sunbnb.user.reservemaster')
@section('book')
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
    <form class="mb-3" action="{{ route('storereservation',['listing' => $listing]) }}" method="post">
        @csrf
        <div class="card-body">
            <div class="row text-center">
                <div class="col-6">
                    <h5>Check in</h5>
                    <h5>{{ $request->checkin }}</h5>
                    <input type="hidden" name="checkin" value="{{ $request->checkin }}">
                </div> 
                <div class="col-6">
                    <h5>Check out</h5>
                    <h5>{{ $request->checkout }}</h5>
                    <input type="hidden" name="checkout" value="{{ $request->checkout }}">
                </div>
            </div>
            <div class="mt-3 border-bottom">
                <h5>Price<span class="float-right">${{ $listing->price }}</span></h5>
                <input type="hidden" name="price" value="${{ $listing->price }}">
            </div>
            <div class="mt-1 border-bottom">
                <h5>Night <span class="float-right">{{ $night }}</span></h5>
            </div>
            <div class="mt-1 border-bottom">
                <h5>Total <span class="float-right">{{ $sumPrice }}</span></h5>
                <input type="hidden" name="total" value="{{ $sumPrice }}">
            </div>
            <div class="mt-3">
                <a href="{{route ('reserve', ['listing' => $listing])}}" class="float-left btn btn-danger btn-lg">Change</a>
                <button type="submit" class="float-right btn btn-primary btn-lg">Book Now</button>
            </div>
        </div>
    </form>
</div>
@endsection