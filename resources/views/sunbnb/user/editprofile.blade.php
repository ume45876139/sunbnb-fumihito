@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-3">
            <p>Edit Profile</p>
            <a href="sunbnb/user/profile" class="btn btn-primary">View My Profile</a>
        </div>
        <div class="col-sm-9 card">
            <h3 class="card-header ">
                 Edit Profile
            </h3>
            {{-- card templete --}}
            <div class="card-body" style="width:100%;">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('updateprofile') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="{{ $user->phonenumber }}" placeholder="{{ $user->phonenumber }}">
                        </div>
                        <div class="form-group">
                            <textarea id="description" class="form-control" name="description">{{ $user->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpassword" id="password" placeholder="New Password (leave brank if you don't need change password)">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Confirm Password">
                        </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection