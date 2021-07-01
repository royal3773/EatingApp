@extends('layouts.app')



@section('navtitle')
    <li class="navbar-brand">設定情報</li>
@endsection

@section('style')
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
    <link href="{{ asset('css/a_Invalid.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <!-- 画像 -->
    <div class="d-flex justify-content-center pb-3"><img src="http://placehold.jp/150x150.png"></div>
    <div class="d-flex justify-content-center pb-3"><img src="{{ $user->image }}"></div>
    

    <!-- 名前 -->
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">名前</div>
        <h5 class="d-flex justify-content-center">{{ $user->name }}</h5>
    </div>
    <!-- メールアドレス -->
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">メールアドレス</div>
      <h5 class="d-flex justify-content-center">{{ $user->email }}</h5>
    </div>
    <!-- 誕生日 -->
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">誕生日</div>
      <h5 class="d-flex justify-content-center">{{ $user->birthday }}</h5>
    </div>
    <!-- 性別 -->
    @if($user->sex === 'man')
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">性別</div>
      <h5 class="d-flex justify-content-center">{{ $user->sex }}</h5>
    </div>
    @elseif($user->sex === 'female')
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">性別</div>
      <h5 class="d-flex justify-content-center">{{ $user->sex }}</h5>
    </div>
    @endif
    <!-- 電話番号 -->
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">電話番号</div>
      <h5 class="d-flex justify-content-center">{{ $user->tel }}</h5>
    </div>
    <!-- 住所 -->

    <div class="d-flex flex-column">
      <div class="d-flex justify-content-center">住所</div>
      <h5 class="d-flex justify-content-center">{{ $user->address }}</h5>
    </div>


</div>

@endsection


