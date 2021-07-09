@extends('layouts.app')



@section('navtitle')
    <a class="navbar-brand" href="/user/setting/"><i class="fas fa-chevron-left"></i>マイページ</a>
    <li class="navbar-brand">行ったことのあるお店</li>
@endsection

@section('style')
    <link href="{{ asset('css/image.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_card.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  
@foreach($reservations_history as $reservation)
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
            </div>

    </div>


@endforeach
<div class="d-flex justify-content-center">
  {{ $reservations_history->links()}}
</div>
</div>

@endsection


