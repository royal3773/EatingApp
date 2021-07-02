@extends('layouts.app')



@section('navtitle')
<a class="navbar-brand" href="javascript:history.back()"><i class="fas fa-chevron-left"></i>設定変更画面</a>
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
        <div class="fixed-bottom pb-6">
            <button type="submit" class="btn btn-lg btn-block btn-success">
                更新
            </button>
        </div>
    </form>
    @endisset
</div>
@endsection


