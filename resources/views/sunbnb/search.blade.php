@extends('layouts.app')
@section('content')
<div class="container">
  {{-- button + collapse --}}
  <div class="text-center">
    <a class="btn btn-primary text-center dropdown-toggle" data-toggle="collapse" data-flip="true" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      More filters
    </a>
    <div class="collapse my-3" id="collapseExample">
      <div class="card card-body">
        <form action="filter" method="GET">
          <div class="border-bottom row">
            {{-- need to use jQuery ui --}}
            <div class="form-group col-6">
              <input id="min" type="text" size="3" readonly />
              <input id="max" type="text" size="3" readonly />
              <div id="slider" style="width:300px;"></div>
            </div>
            <div class="form-group col-3">
              <label for="min-price">Min Price:</label>
              <input type="text" name="min-price" class="form-control" id="min-price">
            </div>
            <div class="form-group col-3">
              <label for="max-price">Max Price</label>
              <input type="text" name="max-price" class="form-control" id="max-price">
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-6 my-2">
              <input type="text" name="startdate" class="form-control" placeholder="StartDate" id="">
            </div>
            <div class="col-6 my-2">
              <input type="text" name="enddate" class="form-control" placeholder="EndDate" id="">
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <input type="checkbox" name="roomtype" value="entireroom" id="entire-room"><label for="entire-room"> Entire Room</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="roomtype" value="private" id="private"><label for="private"> Private</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="roomtype" value="share" id="share"><label for="share"> Share</label>
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <label>Acomodities</label>
              <select required name="accomodate" class="custom-select">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4+</option>
              </select>
            </div>
            <div class="col-4 my-2">
              <label>Bedrooms</label>
              <select required name="bedroom" class="custom-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
            </div>
            <div class="col-4 my-2">
              <label>Bathrooms</label>
              <select required name="bathroom" class="custom-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <input type="checkbox" name="tv" id="tv"><label for="tv"> TV</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="kitchen" id="kitchen"><label for="kitchen"> Kitchen</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="internet" id="internet"><label for="internet"> Internet</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="heating" id="heating"><label for="heating"> Heating</label>
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" name="aircondition" id="air-conditioning"><label for="air-conditioning"> Air Conditioning</label>
            </div>
          </div>
          <button type="submit" class="mt-3 btn btn-primary">submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card-columns mt-5">
    @foreach ($listings as $listing)
    <div class="card" style="width: 18rem;">
      <a href="{{ route('reserve', ['listing' => $listing]) }}">
        @if($listing->images->count() > 0)
          <img class="card-img-top" src="{{ asset($listing->images->first()->file_location) }}" alt="Card image cap">
        @else
          <img class="card-img-top" src="" alt="Card image cap">
        @endif
          <div class="card-body">
            <h4 class="card-title">{{$listing->name}}</h4>
          </div>
      </a>
      <p class="card-text">
          {{ $listing->description }}
      </p>
      <p>⭐︎⭐︎⭐︎⭐︎</p>
      <p>n reviwer</p>
    </div>
    @endforeach
  </div>
</div>
@endsection