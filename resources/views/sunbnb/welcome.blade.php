@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mt-4">
    SunBnb Book unique homes<br>
    and exprience a city like a local.
    </h1>

    <form>
        <div class="row mt-4 mx-auto">
            <input class="col-sm-5 mr-3 form-control" type="text" placeholder="Where are you going ?">
            <input class="col-sm-3 mr-3 form-control" type="text" placeholder="Start Date">
            <input class="col-sm-3 mr-3 form-control" type="text" placeholder="End Date">
            <button type="button" class="shadow-sm mx-auto my-4 col-6 btn btn-primary btn-lg btn-block">Send</button>
        </div>
    </form>

    <table class="table my-3">
        <tbody>
            <tr>
                <td><h1>Homes</h1></td>
            </tr>
        </tbody>
    </table>

    <div class="row my-2 justify-content-between">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('/images/Rentroomstockholm.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Name</h4>
              <p class="card-text">
                  price-type-capacity
              </p>
              <p>⭐︎⭐︎⭐︎⭐︎</p>
              <p>n reviwer</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('/images/f7771c6afc7cc32401286116a7eed6f0.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Name</h4>
                <p class="card-text">
                    price-type-capacity
                </p>
                <p>⭐︎⭐︎⭐︎⭐︎</p>
                <p>n reviwer</p>
            </div>
        </div>

        {{-- {{asset('img\aa')}} --}}
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('images/premiere 1_1920x960.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Name</h4>
                <p class="card-text">
                    price-type-capacity
                </p>
                <p>⭐︎⭐︎⭐︎⭐︎</p>
                <p>n reviwer</p>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-between">
        <h1 class="col-12">Cities</h1>
        <img class="col-sm-3 shadow-sm" src="{{ asset('/images/newYork-1.jpeg') }}" alt="cities" width="180px" height="500px">
        <img class="col-sm-3 shadow-sm" src="{{ asset('/images/London-passes.jpg') }}" alt="cities" width="180px" height="500px">
        <img class="col-sm-3 shadow-sm" src="{{ asset('/images/4507_1_750x503.jpg') }}" alt="cities" width="180px" height="500px">
        <img class="col-sm-3 shadow-sm" src="{{ asset('/images/paris.jpg') }}" alt="cities" width="180px" height="500px">
    </div>

</div>
@endsection