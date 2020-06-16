@extends('layouts.app')
@section('content')
<div class="container">
    <img src="" width="100%">
    <div class="row">
        <div class="col-8 row">
            <div class="border-bottom">
                <div class="col-9">

                </div>
                <div class="col-3">

                </div>
            </div>
            <div class="justify-content border-bottom">
                <div>
                    <i class="fas fa-home"></i>
                </div>
    
                <div>
                    <i class="fas fa-user-circle"></i>
                </div>
                <div>
                    <i class="fas fa-bath"></i>
                </div>
                <div>
                    <i class="fas fa-bed"></i>
                </div>
            </div>
            <div class="border-bottom">
                descrption
            </div>
            <div class="border-bottom">
                Amenities
            </div>
            <div class="border-bottom">
                Slide show
            </div>
            <div class="border-bottom">
               Map
            </div>
            <div>
                Review
            </div>
            <div class="border-bottom">
                Nearbys
            </div>
        </div>
        <div class="col-4">

        </div>
    </div>
     {{-- Add Google Map in the browser --}}
 <div id="map" style="width:400px; height: 400px;"></div>

</div> 
@endsection