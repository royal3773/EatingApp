@extends('layouts.app')



@section('navtitle')
<a class="navbar-brand" href="/user/setting/"><i class="fas fa-chevron-left"></i>マイページ</a>
    <li class="navbar-brand">変更設定画面</li>
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
            <div class="card-header">変更する項目</div>
                <div class="card-body border border-bottom">
                  <a href="/user/setting/edit/name" class="stretched-link　invisible"><p class="h3 text-center">ユーザー名変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                  <a href="/user/setting/edit/email" class="stretched-link　invisible"><p class="h3 text-center">メールアドレス変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit/password" class="stretched-link　invisible"><p class="h3 text-center">パスワード変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit/tel" class="stretched-link　invisible"><p class="h3 text-center">電話番号変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit/address" class="stretched-link　invisible"><p class="h3 text-center">住所変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit/image" class="stretched-link　invisible"><p class="h3 text-center">画像変更</p></a>
                </div>
            </div>
        </div>
</div>

@endsection


