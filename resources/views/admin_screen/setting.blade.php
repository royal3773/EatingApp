@extends('layouts.admin_app')

@section('style')

@endsection
    
@section('content')
@error('old_password')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>パスワードを変更できませんでした。!</strong> もう一度パスワード変更をクリックしてエラー内容を確認して下さい。
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@enderror
@error('password')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>パスワードを変更できませんでした。!</strong> もう一度パスワード変更をクリックしてエラー内容を確認して下さい。
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@enderror

<div class="row">
    <div class="col-4">
      <div class="d-flex justify-content-center pb-3">
        <div class="d-flex flex-column">
            @isset($admin->image)
            <img class="img-fluid" src="{{ $admin->image }}">
            @else
            <img src="http://placehold.jp/150x150.png">
            @endisset
            <div class="text-center">{{ $admin->name }}様の画像</div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit_image" >画像変更</button>
          <!-- <button type="button" class="btn btn-dark" onclick="location.href='/admin/setting/edit'" >プロフィール画像の編集</button> -->
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
          <button type="button" class="btn btn-dark mr-5" onclick="location.href='/admin/setting/edit'">プロフィールの編集</button>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit_password" >パスワード変更</button>
    </div>
    
</div>

<!-- Modal_Image -->
<div class="modal fade" id="edit_image" tabindex="-1" role="dialog" aria-labelledby="edit_image" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">画像の編集</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/admin/setting/image/{{ $admin->id }}" enctype='multipart/form-data'>
                  <!-- 画像蘭-->
                  @csrf
                  <div class="form-group row">
                       <label for="image" class="col-md-4 col-form-label text-md-right">画像</label>
                       <div class="col-md-6">
                           <input id="image" type="file" class="form-control-file
                           {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                           @error('image')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                      </div>
                  </div>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                  <button type="submit" class="btn btn-primary">変更</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal_Password -->
<div class="modal fade" id="edit_password" tabindex="-1" role="dialog" aria-labelledby="edit_image" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">画像の編集</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/admin/setting/password/{{ $admin->id }}" enctype='multipart/form-data'>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">変更</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
