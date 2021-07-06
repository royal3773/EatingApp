@extends('layouts.app')



@section('navtitle')
    <li class="navbar-brand">予約確認画面</li>
@endsection

@section('style')
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  @if (session('flash_message'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h5 class="alert-heading text-center">{{ session('flash_message') }}</h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  
@foreach($reservations as $reservation)
    <div class="card">
        <h5 class="card-header text-center">{{ $reservation->admin->name }}</h5>
        <div class="card-body row justify-content-center">
            @isset($reservation->admin->image)
                <h5 class="card-title pl-3"><img src="{{ $reservation->admin->image }}"></h5>
            @else
                <h5 class="card-title pl-3"><img src="https://placehold.jp/150x150.png"></h5>

            @endisset
              <div class="col-md-7">
                  <div class="row">
                      <p class="card-text font-weight-bold col-4 text-right mb-2">時間</p>
                      <p class="pl-3 col-6 mb-2 ">{{ $reservation['date']->format('Y年m月d H:i') }}</p>
                  </div>
                  <div class="row">
                      <p class="card-text font-weight-bold col-4 text-right mb-2">人数</p>
                      <p class="pl-3 col-6 mb-2">{{ $reservation->count }}</p>
                  </div>
                  
                  <div class="row">
                      <p class="card-text font-weight-bold col-4 text-right mb-2">その他</p>
                  @isset($reservation->comment)
                      <p class="pl-3 col-6 mb-2">{{$reservation->comment}}</p>
                  @else
                      <p class="pl-3 col-6 mb-2">ありません。</p>
                  @endisset
                  </div>
                      
                      
                </div>
                <form name="form" action="/user/reservationcheck" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    <input type="hidden" name="admin_name" value="{{ $reservation->admin->name }}">
                    <input type="hidden" name="date" value="{{ $reservation['date']->format('Y年m月d H:i') }}">
                    <button type="submit" class="btn btn-outline-danger">予約をキャンセルする</button>
                </form>
            </div>

    </div>


  @endforeach
<div class="d-flex justify-content-center">
  {{ $reservations->links()}}
</div>
</div>

@endsection


