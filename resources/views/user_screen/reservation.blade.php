@extends('layouts.app')



@section('navtitle')
    <li class="navbar-brand">予約申し込みページ</li>
@endsection

@section('style')
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    @if (session('flash_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h5 class="alert-heading text-center">{{ session('flash_message') }}</h5>
        <div class="text-center">万が一ご都合によりキャンセルされる場合は予約確認画面から早めの手続きをお願いします。</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h1 class="text-center">予約を申し込みます</h1>
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- 下記を修正する -->
                <div class="card-header">予約店名 {{ $admin->name }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ '/user/reservation/{{{ $admin->id }}}' }}">
                        @csrf
                        <!-- 名前蘭 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  value="{{ $user->name }}" readonly="readonly">
                            </div>
                        </div>
                        <!-- 電話番号 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">電話番号</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  value="{{ $user->tel }}" readonly="readonly">
                            </div>
                        </div>
                        <!-- メールアドレス -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  value="{{ $user->email }}" readonly="readonly">
                            </div>
                        </div>
                        <!-- 予約人数 -->
                        <div class="form-group row">
                            <label for="count" class="col-md-4 col-form-label text-md-right">予約人数</label>
                            <div class="col-md-6">
                                <input id="count" type="number" class="form-control{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" value="{{ old('count') }}" required autofocus min="1">
                                @error('count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 予約日 -->
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">予約日(3ヶ月後まで)</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required min="{{ $today }}" max="{{ $afterday }}" >
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 予約時間 -->
                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">予約時間(10:00~23:00)</label>
                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" min="10:00" max="22:00">
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- その他 -->
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">その他ご要望</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="message" rows="3" name="message" placeholder="例）個室でお願いします。　電話番号を変更しました。..."></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="user_name" value="{{ $user->name }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    予約確定
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection


