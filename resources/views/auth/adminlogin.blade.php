@extends('layouts.admin_app')

@section('style')
<link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="jumbotron my-5">
    <div class="container">
      <div class="row justify-content-center my-4">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">ログイン</div>
            <div class="card-body">
              <form method="POST" action='{{ url("/login/admin") }}' aria-label="{{ __('Login') }}">
                @csrf
                
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label text-md-right">名前</label>
                  
                  <div class="col-md-6">
                    <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                
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
                  @error('auth')
                  <span class="text-danger" role="alert">
                    <p class="text-center">{{ $message }}</p>
                  </span>
                  @enderror
                
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      ログイン
                    </button>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
  </div>

