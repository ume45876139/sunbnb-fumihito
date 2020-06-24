@extends('layouts.app')
@section('content')
<div class="container">
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-flip="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <a class="dropdown-item" href="#!">Action</a>
      <a class="dropdown-item" href="#!">Another action</a>
    </div>
  </div>
</div>
{{-- Retrieves Google Map API information from Google APIs --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.api_key') }}"></script>
@endsection