@extends('layouts.app')

@section('style')
<link href="{{ asset('css/userregister.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- 下記を修正する -->
                <div class="card-header">新規登録</div>
                <!-- 管理者側のログインであれば管理者側へユーザー側であればユーザー側へ変換される -->
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <!-- 名前蘭 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @error ('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- メール蘭 -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メール</label>
                            <div class="col-md-6">
                                <input id="email" type="mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @error ('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワード蘭 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワード確認蘭 -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">確認用パスワード</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- 誕生日 -->
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">誕生日</label>
                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday') }}" required autofocus>
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 性別 -->
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">性別</label>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline {{ $errors->has('sex') ? ' is-invalid' : '' }}">
                                    <input class="form-check-input {{ $errors->has('sex') ? ' is-invalid' : '' }}"  type="radio" name="sex" id="man" value="man" {{ old('sex') === 'man' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="man">男性</label>
                                </div>
                                <div class="form-check form-check-inline {{ $errors->has('sex') ? ' is-invalid' : '' }}">
                                    <input class="form-check-input {{ $errors->has('sex') ? ' is-invalid' : '' }}" type="radio" name="sex" id="woman" value="woman" {{ old('sex') === 'woman' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="woman">女性</label>
                                </div>
                                @error('sex')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- 電話番号 -->
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号(ハイフンなし)</label>
                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 住所 -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 画像 -->
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">画像(任意)</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
    <script src="{{ asset('js/validation.js') }}"></script>
    </div>
</div>
@endsection