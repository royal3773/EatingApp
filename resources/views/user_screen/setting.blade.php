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
 
    {{--  チャット可能ユーザ一覧  --}}
        <div class="card">
            <div class="card-header">{{ $user->name }}の情報</div>
                <div class="card-body border border-bottom">
                  <a href="/user/setting/show" class="stretched-link　invisible"><p class="h3 text-center">アカウント情報詳細</p></a>
                </div>
                <div class="card-body border border-bottom">
                  <a href="/user/setting/edit" class="stretched-link　invisible"><p class="h3 text-center">アカウント情報変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit_password" class="stretched-link　invisible"><p class="h3 text-center">アカウントパスワード変更</p></a>
                </div>
            </div>
        </div>
</div>

@endsection


