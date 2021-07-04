@extends('layouts.app')



@section('navtitle')
<a class="navbar-brand" href="/user/setting/edit"><i class="fas fa-chevron-left"></i>設定変更画面</a>
<li class="navbar-brand">編集画面</li>
@endsection

@section('style')
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
    <link href="{{ asset('css/a_Invalid.css') }}" rel="stylesheet">
    <style>
        .pb-6 {
          padding-bottom: 70px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <!--ーーーーーーーー 名前 -------------------------->
    @isset($user_name)
    <form method="POST" action="/user/setting/edit/name/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf 
        <div class="form-group">
            <label for="name" class="col-form-label col-form-label-lg">お名前</label>
            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg" id="name" placeholder="{{ $user_name }} " required autofocus>
            @error ('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
    <!--ーーーーーーーー メールアドレス -------------------------->
    @isset($user_email)
    <form method="POST" action="/user/setting/edit/email/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf 
        <div class="form-group">
            <label for="email" class="col-form-label col-form-label-lg">メールアドレス</label>
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" id="email" placeholder="{{ $user_email }} " required autofocus>
            @error ('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
    <!--ーーーーーーーー パスワード -------------------------->
    @isset($user_password)
    <form method="POST" action="/user/setting/edit/password/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf 
        <div class="form-group">
            <label for="old_password" class="col-form-label col-form-label-lg">現在のパスワード</label>
            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }} form-control-lg" id="old_password" required autofocus>
            @error ('old_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label col-form-label-lg">新しいパスワード</label>
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" id="password" required autofocus>
            @error ('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group pb-5">
            <label for="password-confirm" class="ol-form-label col-form-label-lg">確認用パスワード</label>
            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required>
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
        <!--ーーーーーーーー 電話番号 -------------------------->
    @isset($user_tel)
    <form method="POST" action="/user/setting/edit/tel/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">
            <label for="tel" class="col-form-label col-form-label-lg">電話番号</label>
            <input type="tel" name="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }} form-control-lg" id="tel" placeholder="ハイフンなし　{{ $user_tel }} " required autofocus>
            @error ('tel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
        <!--ーーーーーーーー 住所変更 -------------------------->
    @isset($user_address)
    <form method="POST" action="/user/setting/edit/address/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">
            <label for="address" class="col-form-label col-form-label-lg">電話番号</label>
            <input type="address" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} form-control-lg" id="address" placeholder="{{ $user_address }} " required autofocus>
            @error ('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
    <!--ーーーーーーーー画像変更 -------------------------->
    @isset($user_image)
    <div class="d-flex justify-content-center pb-3">
        <img class="img-fluid" width=300 src="{{ $user_image }}">
    </div>
    <form method="POST" action="/user/setting/edit/image/{{ $user_id }}" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">
            <label for="image" class="col-form-label col-form-label-lg">画像</label>
            <input type="file" name="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }} form-control-lg" id="image"  required autofocus>
            @error ('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fixed-bottom pb-6 px-5">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
</div>
@endsection


