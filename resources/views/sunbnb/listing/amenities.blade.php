@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
        Amenities
    </div>
    <form action="storeamenities" method="POST">
        @csrf
        <div class="row">
            <div class="col-4 my-3">
                <input type="hidden" name="tv" value="0">
                <input type="checkbox" @if($listing->tv)checked @endif value="1" name="tv" id="tv">
                <label for="tv">TV</label>
            </div>
            <div class="col-4 my-3">
                <input type="hidden" name="kitchen" value="0">
                <input type="checkbox" @if($listing->kitchen)checked @endif value="1" name="kitchen" id="kitchen">
                <label for="kitchen">Kitchen</label>
            </div>
            <div class="col-4 my-3">
                <input type="hidden"  name="internet" value="0">
                <input type="checkbox" @if($listing->internet)checked @endif value="1" name="internet" id="internet">
                <label for='internet'>Internet</label>
            </div>
            <div class="col-4 my-3">
                <input type="hidden" name="heating" value="0">
                <input type="checkbox" @if($listing->heating)checked @endif value="1" name="heating" id="heating">
                <label for="heating">Heating</label>
            </div>
            <div class="col-4 my-3">
                <input type="hidden" name="aircondition" value="0">
                <input type="checkbox" @if($listing->aircondition)checked @endif value="1" name="aircondition" id="aircondition">
                <label for="aircondition">Conditioning</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection