@extends('layouts.app')
@section('content')
<style>
    .evaluation{
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
}
.evaluation input[type='radio']{
  display: none;
}
.evaluation label{
  position: relative;
  padding: 10px 10px 0;
  color: gray;
  cursor: pointer;
  font-size: 15px;
}
.evaluation label .text{
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  text-align: center;
  font-size: 12px;
  color: gray;
}
.evaluation label:hover,
.evaluation label:hover ~ label,
.evaluation input[type='radio']:checked ~ label{
  color: #ffcc00;
}
</style>
<div class="container">
    <img src="{{ asset($listing->images->first()->file_location) }}" width="100%">
    <div class="row">
        <div class="col-sm-8">
            <div class="mt-2 row">
                <div class="col-8">
                    <p style="font-size:3em; line-height:-1.5rem;">{{ $listing->name }}</p>
                    <p style="font-size:1.1em;">{{ $listing->city }}</p>
                </div>
                <div class="float-right col-4 text-center">
                    <img src="/images/images.jpeg" style="width:150px; height:150px; border-radius:50%;">
                    <h5>{{ $listing->user->name }}</h5>
                </div>
            </div>
            <div class="d-flex justify-content-between border-bottom border-top text-center my-3" style="font-size:3rem;">
                @if($listing->hometype === "House")
                <div class="d-inline">
                    <i class="fas fa-home"></i>
                    <h4>House</h4>
                </div>
                @elseif($listing->hometype ==="Bed & Breakfast")
                <div class="d-inline">
                    <i class="fas fa-bread-slice"></i>
                    <h4>Bed & Breakfast</h4>
                </div>
                @else
                <div class="d-inline">
                    <i class="far fa-building"></i>
                    <h4>Apart</h4>
                </div>
                @endif
                @if($listing->roomtype === "share")
                <div class="d-inline">
                    <i class="fab fa-slideshare"></i>
                    <h4>Share</h4>
                </div>
                @else
                <div class="d-inline">
                    <i class="fas fa-user-lock"></i>
                    <h4>Private</h4>
                </div>
                @endif
                <div class="d-inline">
                    <i class="fas fa-user-circle"></i>
                    <h4>{{ $listing->accomodate }}Guests</h4>
                </div>
                <div class="d-inline">
                    <i class="fas fa-bath"></i>
                    <h4>{{ $listing->bathroom }}Bathrooms</h4>
                </div>
                <div class="d-inline">
                    <i class="fas fa-bed"></i>
                    <h4>{{ $listing->bedroom }}bedrooms</h4>
                </div>
            </div>
            <div class="border-bottom my-3">
                <h3>About this listing</h3>
                <p>{{ $listing->summary }}</p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h3>Amenities</h3>
                </div>
                <div class="col-sm-9 row">
                    <div class="col-6">
                        @if($listing->tv)<p>TV</p>
                        @else<p　style="text-decoration: line-through;">TV</p>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($listing->aircondition)<p>Air Condition</p>
                        @else<p　style="text-decoration: line-through;">Air Condition</p>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($listing->heating)<p>Heating</p>
                        @else<p　style="text-decoration: line-through;">Heating</p>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($listing->internet)<p>Internet</p>
                        @else<p　style="text-decoration: line-through;">Internet</p>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($listing->kitchen)<p>Kitchen</p>
                        @else<p　style="text-decoration: line-through;">Kitchen</p>
                        @endif
                    </div>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide　border-bottom border-top" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach ($listing->images as $key => $image)
                    <div class="carousel-item @if($key === 1)active @endif">{{-- foreach & if --}}
                    <img class="d-block w-100" src="{{ $image->file_location }}" data-src="holder.js/900x400?theme=industrial" alt="900x400" data-holder-rendered="true" style="width: 900px; height: 400px;">
                    </div>                  
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            {{-- Add Google Map in the browser --}}
            <div class="border-bottom border-top my-5">
                <div id="map" class="py-3" style="width:100%; height: 400px;"></div>
            </div>
            {{-- Retrieves Google Map API information from Google APIs --}}
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.api_key') }}"></script>               
            <div>
                @if($reviews !== null)
                <div>
                    <h3 class="d-inline">{{$reviews->count()}}Reviews</h3>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $avg)
                            <label for="star1">⭐️</label>
                        @else
                            <label for="star1">★</label>
                        @endif
                    @endfor
                </div>
                @foreach ($reviews as $review)
                    <div class="row">
                        <div class="col-2 text-center">
                            <img src="/images/images.jpeg" style="width:50px; height:50px; border-radius:50%;">
                            <h5>{{ $user::find($review->author_id)->name}}</h5>
                        </div>
                        <div class="col-10">
                            @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->star)
                                <label for="star1">⭐️</label>
                            @else
                                <label for="star1">★</label>
                            @endif
                            @endfor
                            <p>{{$review->created_at}}</p>
                            <p>{{$review->description}}</p>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            <div class="border-bottom">
                Nearby
            </div>
        </div>

        <div class="col-sm-4">
            @if (isset($sumPrice))
                @yield('book')
            @elseif(Auth::user())
                @yield('reserve')
            @else
            <div class="card mt-3">
                <div class="card-header">{{ __('Login') }}</div>
            
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
            
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
 
    $('input[type="date"]').datepicker();

    function initialize() {
        var location = { lat:{{ $listing->latitude }}, lng: {{ $listing->longitude }} };
        var map = new google.maps.Map(document.getElementById('map'), { center: location,
        zoom: 14
        });
        var marker = new google.maps.Marker({ position: location,
        map: map
        }); }
        google.maps.event.addDomListener(window, 'load', initialize); 
    </script>
    <script>
        var infoWindow = new google.maps.InfoWindow({ content: "<div id='content'><img src=''></div>"
        });
        infoWindow.open(map, marker);
    </script>
@endsection