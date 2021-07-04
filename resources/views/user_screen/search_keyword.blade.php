@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/search_keyword.css') }}" rel="stylesheet">
@endsection

@section('navtitle')
    <a class="navbar-brand" href="/user/top"><i class="fas fa-arrow-left"></i> 検索一覧</a>
@endsection

@section('content')
<div class="container">
        @for ($i = 0; $i < $restaurants['results_returned']; $i++)

    </table>
    <div class="card">
  <h5 class="card-header text-center"><a href="{{ $restaurants['shop'][$i]['urls']['pc'] }}">{{ $restaurants['shop'][$i]['name'] }}</a></h5>
  <div class="card-body row">
    <h5 class="card-title pl-3"><img src="{{ $restaurants['shop'][$i]['photo']['mobile']['l'] }}" alt="restaurants_img"></h5>
    <div class="col-md-7">
        <p class="card-text font-weight-bold mb-0">{{ $restaurants['shop'][$i]['genre']['catch'] }}</p>
        <p class="card-text mb-0">場所　{{ $restaurants['shop'][$i]['address'] }}</p>
        <p class="card-text mb-0">営業時間　{{ $restaurants['shop'][$i]['open'] }}</p>
        <p class="card-text mb-0">定休日　{{ $restaurants['shop'][$i]['close'] }}</p>
        <p class="card-text mb-0">席数　{{ $restaurants['shop'][$i]['capacity'] }}</p>
        <p class="card-text mb-0">駐車場　{{ $restaurants['shop'][$i]['parking'] }}</p>
    </div>

    <form name="form">
        <input type="hidden" name="restaurant_id{{ $i }}" value="{{ $restaurants['shop'][$i]['id'] }}">
    @if(0 === $favorites->where('restaurant_id', $restaurants['shop'][$i]['id'])->count())
        <button type="button"　 class="btn  btn-favorite-register btn-check1 btn-change1{{ $i }} btn-outline-danger col m-1 rounded-pill" value="{{ $i }}"><i class="far fa-heart"></i>お気に入り追加</button>
    @else
        <button type="button"　 class="btn  btn-favorite-delete btn-check2 btn-change2{{ $i }} btn-danger col m-1 rounded-pill" value="{{ $i }}"><i class="fas fa-heart"></i>お気に入り解除</button>
    @endif
        <button type="button"　 class="btn  btn-favorite-register btn-check2 btn-change2{{ $i }} btn-outline-danger col m-1 rounded-pill d-none" value="{{ $i }}"　onclick="style.display='none'"><i class="far fa-heart"></i>お気に入り追加</button>
    
        <button type="button"　 class="btn  btn-favorite-delete btn-check1 btn-change1{{ $i }} btn-danger col m-1 rounded-pill d-none" value="{{ $i }}"><i class="fas fa-heart"></i>お気に入り解除</button>
    </form>

  </div>
  


</div>
@endfor
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="start_numbar" id="start" value="{{ $start }}">
@isset($genre)
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item" id="start_num1"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{1}}">1</a></li>
        <li class="page-item" id="start_num10"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{10}}">2</a></li>
        <li class="page-item" id="start_num20"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{20}}">3</a></li>
        <li class="page-item" id="start_num30"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{30}}">4</a></li>
        <li class="page-item" id="start_num40"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{40}}">5</a></li>
        <li class="page-item" id="start_num50"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{50}}">6</a></li>
        <li class="page-item" id="start_num60"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{60}}">7</a></li>
        <li class="page-item" id="start_num70"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{70}}">8</a></li>
        <li class="page-item" id="start_num80"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{80}}">9</a></li>
        <li class="page-item" id="start_num90"><a class="page-link" href="/user/top/genre/{{$genre}}/{{$address}}/{{90}}">10</a></li>
    </ul>
</nav>
@endisset
@isset($special)
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item" id="start_num1"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{1}}">1</a></li>
        <li class="page-item" id="start_num10"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{10}}">2</a></li>
        <li class="page-item" id="start_num20"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{20}}">3</a></li>
        <li class="page-item" id="start_num30"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{30}}">4</a></li>
        <li class="page-item" id="start_num40"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{40}}">5</a></li>
        <li class="page-item" id="start_num50"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{50}}">6</a></li>
        <li class="page-item" id="start_num60"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{60}}">7</a></li>
        <li class="page-item" id="start_num70"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{70}}">8</a></li>
        <li class="page-item" id="start_num80"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{80}}">9</a></li>
        <li class="page-item" id="start_num90"><a class="page-link" href="/user/top/special/{{$special}}/{{$address}}/{{90}}">10</a></li>
    </ul>
</nav>
@endisset
</div>
@endsection

@section('script')
<script type="text/javascript">

    window.addEventListener('DOMContentLoaded', function () {

        //ボタンの切り替え作業　登録<->削除
        $('.btn-check1').on('click', function() {
          let i = $(this).val();
          $('.btn-change1' + i).removeClass('d-none');
          $(this).addClass('d-none');
        })
        //ボタンの切り替え作業 削除<->登録
        $('.btn-check2').on('click', function() {
          let i = $(this).val();
          $('.btn-change2' + i).removeClass('d-none');
          $(this).addClass('d-none');
        })
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }});
              //お気に入りのお店を登録
              $('.btn-favorite-register').on('click' , function(){
                const i = $(this).val();
                const restaurant_id = "input[name=" + "restaurant_id" + i + ']';
                const user_id = 'input[name="user_id"]';
                $.ajax({
                  type : 'POST',
                  url : '/user/' + i + '/favorite',
                  data : {
                    restaurant_id : $(restaurant_id).val(),
                    user_id : $(user_id).val(),
                  }
                }).done(function(result){
                  $('input[name="restaurant_id{{ $i }}"]').val('');
                }).fail(function(result){
                  
                });
              });
              
              //お気に入りのお店を削除
              $('.btn-favorite-delete').on('click' , function(){
                const i = $(this).val();
                const restaurant_id = "input[name=" + "restaurant_id" + i + ']';
                const user_id = 'input[name="user_id"]';
                $.ajax({
                  type : 'POST',
                  url : '/user/' + i + '/favorite_delete',
                  data : {
                    restaurant_id : $(restaurant_id).val(),
                    user_id : $(user_id).val(),
                  }
                }).done(function(result){
                  $('input[name="restaurant_id{{ $i }}"]').val('');
                }).fail(function(result){
                  
                });
              });
        });

//ペジネーション機能現在何ページかを表示する処理
const start = document.getElementById("start")
const start_value = start.value
console.log(start_value);
const page = document.getElementById("start_num"+start_value);
page.classList.add('active');
console.log(page);


</script>
@endsection



