@extends('layouts.app')



@section('navtitle')
<a class="navbar-brand" href="javascript:history.back()"><i class="fas fa-chevron-left"></i>マイページ</a>
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
                  <a href="/user/setting/edit/mail" class="stretched-link　invisible"><p class="h3 text-center">メールアドレス変更</p></a>
                </div>
                <div class="card-body border border-bottom">
                    <a href="/user/setting/edit/password" class="stretched-link　invisible"><p class="h3 text-center">パスワード変更</p></a>
                </div>
            </div>
        </div>
</div>

@endsection


