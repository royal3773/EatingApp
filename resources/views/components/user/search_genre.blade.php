
<div class="container mb-5">

  <h1 class="h3 mb-4">ジャンル別で選ぶ</h1>
  <div id="carousel-card" class="carousel slide" data-interval="5000">
    
    <ol class="carousel-indicators">
      <li data-target="#carousel-card" data-slide-to="0" class="active">
        <img src="https://placehold.it/100x50" alt="img">
      </li>
      <li data-target="#carousel-card" data-slide-to="1">
        <img src="https://placehold.it/100x50" alt="img">
      </li>
      <li data-target="#carousel-card" data-slide-to="2">
        <img src="https://placehold.it/100x50" alt="img">
      </li>

    </ol>

    <div class="carousel-inner">
      <div class="carousel-item px-2 active">
        <div class="card-deck row row-eq-height">
          <div class="col-6">
            <div class="card">
              <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/japanese_food.jpg') }}" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title text-center font-weight-bold">和食</h5>
                  <form action="/user/top/genre" method="POST">
                      @csrf
                      @component('components.user.prefectures')@endcomponent
                      <input type="hidden" name="food" value="G004">
                      <div class="row justify-content-center pt-1">
                          <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                      </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <img class="card-img-top rounded d-block mx-auto" src="{{ asset('image/western_food.jpg') }}" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title text-center font-weight-bold">洋食</h5>
                  <form action="/user/top/genre" method="POST">
                      @csrf
                      @component('components.user.prefectures')@endcomponent
                      <input type="hidden" name="food" value="G007">
                      <div class="row justify-content-center pt-1">
                          <button type='submit' class="btn btn-success btn-block text-center ">検索</button>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="carousel-item px-5">
        <div class="row">
          <div class="col-4">
            <div class="card">
              <img class="card-img-top" src="https://placehold.it/400x300" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title 3</h5>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <img class="card-img-top" src="https://placehold.it/400x300" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title 4</h5>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <img class="card-img-top" src="https://placehold.it/400x300" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title 5</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="carousel-item px-5">

      </div>
    </div>

    
    <a class="carousel-control-prev" href="#carousel-card" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-card" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <a class="carousel-control-next" href="#carousel-card" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <style>
#carousel-card .carousel-control-next,
#carousel-card .carousel-control-prev {
  width: 3%;
  background-color: #333;
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