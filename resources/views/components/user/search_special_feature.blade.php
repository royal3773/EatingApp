
<div class="container mb-5">

<h1 class="h3 mb-4">シーンに合わせて</h1>
<div id="carousel-card1" class="carousel slide" data-interval="5000">
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-card1" data-slide-to="3" class="active"></li>
    <li data-target="#carousel-card1" data-slide-to="4"></li>
    <li data-target="#carousel-card1" data-slide-to="5"></li>

  </ol>

<div class="carousel-inner">
    <div class="carousel-item px-2 active">
      <div class="card-deck row row-eq-height">
        <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/lovers.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">デートで使いたい</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LY008">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/lunch.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">ランチをしたい</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LY008">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="carousel-item px-2">
    <div class="card-deck row row-eq-height">
      <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/meat.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">お肉を食べたい</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LU0054">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
      </div>
      <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/relax.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">くつろげる場所</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LY0065">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>


<div class="carousel-item px-2">
  <div class="card-deck row row-eq-height">
      <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/second_party.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">二次会にピッタリ</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LT0092">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
      </div>
      <div class="col-6">
          <div class="card">
            <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/bar.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center font-weight-bold">クールなBAR</h5>
                <form action="/user/top/special_feature" method="POST">
                    @csrf
                    @component('components.user.prefectures')@endcomponent
                    <input type="hidden" name="special_feature" value="LU0011">
                    <div class="row justify-content-center pt-1">
                        <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                    </div>
              </form>
            </div>
          </div>
      </div>
    </div>

  </div>
</div>

  
  <a class="carousel-control-prev" href="#carousel-card1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-card1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<style>
/* #carousel-card .carousel-control-next,
#carousel-card .carousel-control-prev {
width: 3%;
background-color: #333;
} */

.carousel-control-prev-icon,
.carousel-control-next-icon {
height: 100px;
width: 100px;
outline: black;
background-size: 100%, 100%;
border-radius: 50%;
background-image: none;
}

.carousel-control-next-icon:after
{
content: '>';
font-size: 55px;
color: darkorange;
}

.carousel-control-prev-icon:after {
content: '<';
font-size: 55px;
color: darkorange;
}
.row-eq-height {
  display: flex;
  flex-wrap: wrap;
}
.card-img-top {
max-width: 100%;
flex-shrink:0;
}
.card-text {
 font-size: 0.1rem;
}
.col-6 {
 padding: 0 5px;
}

.btn-block {
width: 50%;
}
/* 通常のボタン色 */
.btn-success,
.btn-success.disabled, .btn-success:disabled {
color: #fff;
background-color: #6A040F;
border-color: #6A040F;
}

/* focusされた時の枠線の色 */
.btn-success:focus, .btn-success.focus,
.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-success.dropdown-toggle:focus {
box-shadow: 0 0 0 0.2rem rgba(110, 3, 27, 0.5);
}

/* hover時（マウスカーソルを重ねた時）の色（通常より濃いor暗めの色を指定）*/
.btn-success:hover {
color: #fff;
background-color: #6a040e94;
border-color: #6a040e94;
}

/* active時の色（hover時と同等かさらに濃いor暗めの色を指定） */
.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
.show > .btn-success.dropdown-toggle {
color: #fff;
background-color: #6A040F;
border-color: #6A040F;
}
</style>

</div>