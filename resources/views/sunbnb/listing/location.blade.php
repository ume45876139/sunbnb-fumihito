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
                <input class="form-control" type="text" value="{{ $listing->address }}" name="location">
            </div>
            {{-- Retrieves Google Map API information from Google APIs --}}
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.api_key') }}"></script>
            {{-- Add Google Map in the browser --}}
            <div id="map" style="width:100%; height: 400px;"></div>
            <button type="submit" class="mt-3 btn btn-primary">Save</button>
        </form>
    </div>
</div>
<script>
function initialize() {
    var location = { lat:{{ $listing->latitude }}, lng: {{ $listing->longitude }} };
    var map = new google.maps.Map(document.getElementById('map'), { 
        center: location,
        zoom: 14
    });
    var marker = new google.maps.Marker({ position: location, map: map
    }); 
}
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>
<script>
    var infoWindow = new google.maps.InfoWindow({
        content: "<div id='content'><img src=''></div>"
    });
    infoWindow.open(map, marker);
</script>
@endsection