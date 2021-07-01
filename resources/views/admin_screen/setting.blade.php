@extends('layouts.admin_app')

@section('style')

@endsection
    
@section('content')
<div class="row">
    <div class="col-4">
      <div class="d-flex justify-content-center pb-3">
        <div class="d-flex flex-column">
            <img src="http://placehold.jp/150x150.png">
            <img class="img-fluid" src="{{ $admin->image }}">
            <div class="text-center">{{ $admin->name }}様の画像</div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-dark" onclick="location.href='/admin/setting/edit'">プロフィール編集</button>
      </div>
    </div>

    <div class="col-8">
        <div class="d-flex flex-column">
            <p class="mb-0">お名前</p>
            <h3>{{ $admin->name }}</h3>
        </div>
        <div class="d-flex flex-column">
            <p class="mb-0">メールアドレス</p>
            <h3>{{ $admin->mail }}</h3>
        </div>
        <div class="d-flex flex-column">
            <p class="mb-0">電話番号</p>
            <h3>{{ $admin->tel }}</h3>
        </div>
        <div class="d-flex flex-column">
            <p class="mb-0">住所</p>
            <h3>{{ $admin->address }}</h3>
        </div>

    </div>
    
</div>
@endsection
