@extends('layouts.app')

@section('style')
<script src="{{ mix('js/usertop.js') }}"></script>
<link href="{{ asset('css/usertop.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                      <div class="jumbotron">
                          <form class="input-group my-5" action="/user/top/search_keyword" method="POST">
                          @csrf
                              <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search">
                              <button type="submit" class="btn btn-success">search</button>
                          </form>
                          <form class="input-group justify-content-center my-5" action="/user/top/search_keyword" method="POST">
                          @csrf
                              <input type="hidden" id="latitude" name="latitude" >
                              <input type="hidden" id="longitude" name="longitude" >
                              <button type="submit" class="btn btn-success">とりあえず近くのお店を探す</button>
                          </form>
                          
                      </div>
                </div>
            </div>
        </div>
    </div>


                <div>
                <a class="btn btn-primary" href = "userchatselect">testチャット画面一覧</a>
                </div>

  @component('components.user.search_genre')
  @endcomponent



  @component('components.user.search_special_feature')
  @endcomponent

</div>

@endsection

