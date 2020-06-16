@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-body" style="width:100%;">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="" method="POST">
            @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                </div>
                <div class="form-group">
                    <textarea id="description" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="" value="">
                </div>
                <div class="form-group">
                    <label>Star</label>
                    <select required name="bedroom" class="custom-select">
                        <option selected>Select...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
        </form>
    </div>
</div>

@endsection