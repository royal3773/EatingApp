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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
 
        </div>
    </div>
 
        <div class="card">
            <div class="card-header">{{ $user->name }}の情報</div>
            <div class="card-body border border-bottom">
              <a href="/user/setting/show" class="stretched-link　invisible"><p class="h3 text-center">アカウント情報詳細</p></a>
            </div>
            <div class="card-body border border-bottom">
              <a href="/user/setting/edit" class="stretched-link　invisible"><p class="h3 text-center">アカウント情報変更</p></a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">ご利用状況</div>
            <div class="card-body border border-bottom">
                <a href="/user/setting/reservation" class="stretched-link　invisible"><p class="h3 text-center">利用したことあるお店</p></a>
            </div>
        </div>
</div>


@endsection


