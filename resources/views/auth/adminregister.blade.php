@extends('layouts.app')

@section('style')
<link href="{{ asset('css/adminregister.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="box">
    <img class="img-fluid" alt="food" src="{{ asset('image/food.jpg') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>
                <!-- 管理者側のログインであれば管理者側へユーザー側であればユーザー側へ変換される -->
                <div class="card-body">
                    <form method="POST" action="/register/admin" aria-label="{{ __('Register') }}">
                        @csrf
                        <!-- 名前蘭 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- パスワード蘭 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- パスワード確認蘭 -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">確認用パスワード</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- メール蘭 -->
                        <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">メール</label>

                            <div class="col-md-6">
                                <input id="mail" type="mail" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="mail" value="{{ old('mail') }}" required autofocus>
                            </div>
                        </div>
                        <!-- 電話番号 -->
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>
                            </div>
                        </div>
                        <!-- 住所蘭 -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                            </div>
                        </div>
                        <!-- 画像蘭-->
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">画像</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                            </div>
                        </div>
                        
                    <!-- ここから下はユーザー情報を登録する画面 -->
                                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    新規登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection