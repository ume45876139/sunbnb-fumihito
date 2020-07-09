@extends('sunbnb.user.master')
@section('main-contents')
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
  font-size: 30px;
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
    <div class="col-sm-9 card">
        <h3 class="card-header">
             Reservations
        </h3>
        <table>
            @if($reservations === null)
                <p>no reservation</p>
            @else
                @foreach ($reservations as $reservation)
                <tr>
                    {{-- card templete --}}
                    <div class="card-body border-bottom" style="width:100%;">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <p>{{ $reservation->start_date }}</p>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                @if($reservation->listing->images->count() > 0)
                                    <img class="card-img-top" src="{{ asset($reservation->listing->images->first()->file_location) }}" alt="Card image cap" width="170" height="120">
                                @else
                                    <img class="card-img-top" src="" alt="Card image cap">
                                @endif
                            </div>
                            <div class="text-right col-sm-3 col-md-7" style="width:100%;">
                                <h5 class="text-left mt-0">
                                    {{ $reservation->listing->name }}
                                </h5>
                                <h5 class="text-left mt-0">
                                    {{ $reservation->listing->user->name }}
                                </h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Review Host</button>
                                <!-- Modal -->
                                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Review Host</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form action="{{ route('reviewtohost', ['reservation' => $reservation]) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="evaluation">
                                                    <input id="star1" type="radio" name="star" value="5" />
                                                    <label for="star1">★</label>
                                                    <input id="star2" type="radio" name="star" value="4" />
                                                    <label for="star2">★</label>
                                                    <input id="star3" type="radio" name="star" value="3" />
                                                    <label for="star3">★</label>
                                                    <input id="star4" type="radio" name="star" value="2" />
                                                    <label for="star4">★</label>
                                                    <input id="star5" type="radio" name="star" value="1" />
                                                    <label for="star5">★</label>
                                                </div>
                                                <textarea type="text" class="form-control" name="description"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection