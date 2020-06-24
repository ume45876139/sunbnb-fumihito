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
        <form class="">
          <div class="border-bottom row">
            {{-- need to use jQuery ui --}}
            <div class="form-group col-6">
              <input id="min" type="text" size="3" readonly />
              <input id="max" type="text" size="3" readonly />
              <div id="slider" style="width:300px;"></div>
            </div>
            <div class="form-group col-3">
              <label for="strartDate">test</label>
              <input type="text" class="form-control" id="startDate">
            </div>
            <div class="form-group col-3">
              <label for="endDate">test</label>
              <input type="text" class="form-control" id="endDate">
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-6 my-2">
              <input type="text" class="form-control" id="">
            </div>
            <div class="col-6 my-2">
              <input type="text" class="form-control" id="">
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <label for="endDate">test</label>
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <label for="endDate">test</label>
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <label for="endDate">test</label>
              <input type="checkbox" class="form-control" id="">
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <label>Acomodities</label>
              <select required name="acomodities" class="custom-select">
                  <option selected>Select...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4+</option>
              </select>
            </div>
            <div class="col-4 my-2">
              <label></label>
              <select required name="" class="custom-select">
                <option selected>Select...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
            </div>
            <div class="col-4 my-2">
              <label></label>
              <select required name="" class="custom-select">
                <option selected>Select...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
            </div>
          </div>
          <div class="border-bottom row">
            <div class="col-4 my-2">
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" class="form-control" id="">
            </div>
            <div class="col-4 my-2">
              <input type="checkbox" class="form-control" id="">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">submit</button>
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