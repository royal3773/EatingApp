@extends('layouts.app')


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
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    </ul>
    <form name="form">
        <input type="text" name="restaurant_id{{ $i }}" value="{{ $restaurants['shop'][$i]['id'] }}">
        <button type="button"　 class="btn btn-info btn-lg btn-favorite col-2 m-1 rounded-pill " id="btn_send{{ $i }}" value="{{ $i }}">送信</button>
    </form>
        <input type="text" name="i_count" value="{{ $i }}">
  </div>
  <h1>{{ $favorites->restaurant_id()->where('restaurant_id', $restaurants['shop'][$i]['id'])->exists() }}</h1>
  <!-- <div class="d-block">
        <ul>
            <li class="btn btn-info">ボタン1</li>
            <li class="btn btn-info d-none">ボタン2</li>
        </ul> 
  </div> -->
</div>
@endfor
        <input type="text" name="user_id" value="{{ Auth::id() }}">
</div>
@endsection

@section('script')
<script type="text/javascript">

    window.addEventListener('DOMContentLoaded', function () {
  //     $('.btn-info').on('click', function() {
  // console.log('テスト');
  //   $('.btn-info').removeClass('d-none');
  //   $(this).addClass('d-none');
// });
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }});

              $('.btn-favorite').on('click' , function(){
                const i = $(this).val();
                const restaurant_id = "input[name=" + "restaurant_id" + i + ']';
                const user_id = 'input[name="user_id"]';
                console.log($(restaurant_id).val());
                console.log($(user_id).val());
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
        });

</script>
@endsection



