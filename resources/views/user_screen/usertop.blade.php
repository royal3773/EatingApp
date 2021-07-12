@extends('layouts.app')

@section('style')
<script src="{{ mix('js/usertop.js') }}"></script>
<link href="{{ asset('css/usertop.css') }}" rel="stylesheet">
<link href="{{ asset('css/btn.css') }}" rel="stylesheet">
@endsection

@section('navtitle')
<li class="navbar-brand">トップページ</li>
@endsection

@section('content')
<div class="container">
<div id="location"></div>
<a href="http://webservice.recruit.co.jp/"><img src="http://webservice.recruit.co.jp/banner/hotpepper-s.gif" alt="ホットペッパー Webサービス" width="135" height="17" border="0" title="ホットペッパー Webサービス"></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                      <div class="jumbotron">
                          <form class="input-group my-5" action="/user/top/search_keyword" method="POST">
                          @csrf
                              <input type="search" name="keyword" class="form-control rounded" placeholder="（例）東京　寿司　・・・" aria-label="Search">
                              <button type="submit" class="btn btn-success">search <i class="fas fa-search"></i></button>
                          </form>
                          <form name="range" class="input-group justify-content-center my-5" action="/user/top/search_keyword" method="POST">
                          @csrf
                              <input type="hidden" id="latitude" name="latitude" >
                              <input type="hidden" id="longitude" name="longitude" >
                              <button type="submit" class="btn btn-success" onClick="return check()">とりあえず近くのお店を探す</button>
                          </form>
                          
                      </div>
                </div>
            </div>
        </div>
    </div>

  @component('components.user.search_genre')
  @endcomponent



  @component('components.user.search_special_feature')
  @endcomponent

</div>
<script type="text/javascript">

function check(){
    const form = document.forms.range;
    // 名前の値のチェック
    if(form.latitude.value==""){
        alert("現在地の情報が取得できておりません。もう少しお待ち下さい");
        return false;
    }else if(form.location.value==""){
        alert("現在の情報が所得できておりません。もう少しお待ち下さい")
    }
}
</script>

@endsection


