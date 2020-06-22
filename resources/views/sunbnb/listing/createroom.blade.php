@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        Create Your Beautiful Place
        </div>
        <div class="card-body">
            <form action="storeroom" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4 my-3">
                        <label>Home Type</label>
                        <select required name="hometype" class="custom-select">
                            <option selected>Select...</option>
                            <option value="Apartment">Apartment</option>
                            <option value="House">House</option>
                            <option value="Bed & Breakfast">Bed & Breakfast</option>
                        </select>
                    </div>

                    <div class="col-4 my-3">
                        <label>Room Type</label>
                        <select required name="roomtype" class="custom-select">
                            <option selected>Select...</option>
                            <option value="Entire">Entire</option>
                            <option value="Private">Private</option>
                            <option value="Shared">Shared</option>
                        </select>
                    </div>

                    <div class="col-4 my-3">
                        <label>Accomodate</label>
                        <select required name="accomodate" class="custom-select">
                            <option selected>Select...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4+</option>
                        </select>
                    </div>

                    <div class="col-4 my-3">
                        <label>Bedrooms</label>
                        <select required name="bedroom" class="custom-select">
                            <option selected>Select...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4+</option>
                        </select>
                    </div>

                    <div class="col-4 my-3">
                        <label>Bathrooms</label>
                        <select required name="bathroom" class="custom-select">
                            <option selected>Select...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                </div>
                <button type="submit"  class="btn btn-primary">Create My Room</button>
            </form>
        </div>
    </div>
</div>
@endsection