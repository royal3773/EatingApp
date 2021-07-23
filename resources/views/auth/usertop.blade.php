<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/usertop.css') }}" rel="stylesheet">
  <script src="{{ mix('js/app.js') }}" defer></script>
  
  <title>Document</title>
</head>
<body>

<!-- <div id="js-scroll-top" class="scroll-top">TOP</div> -->
<!-- <div id="page-top" class="blogicon-chevron-up"></div> -->
<button class="scroll-top" id="js-button"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
<!----------------- ヘッダー ---------------->
<div class="row">
    <div class="col">
        <h4 class="pt-1 text-center">EatingApp</h4>
    </div>
    <div class="col">
        <p class="m-0 font-size-small">アプリの使い方の説明</p>
        <p class="m-0 font-size-small">お問い合わせはこちら</p>
    </div>
</div>

<!----------------- 写真 ---------------->
<div class="card bg-dark text-white">
    <img class="bd-placeholder-img bd-placeholder-img-lg card-img img-fluid meat-img" alt="cake" src="{{ asset('image/meat_top.jpg') }}">
    <div class="card-img-overlay">
        <h1 class="img-text">Eating App</h1>
        <h4 class="card-text text-center text-body pt-4 font-weight-bold font-italic">新しい料理の発見は、新しい星の発見よりも人類を幸福にする</h4>
    </div>
</div>

<!----------------- ナビゲーションバー ---------------->

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#EatingApp">Eating Appとは /<span class="sr-only">(current)</span>
            <a class="nav-item nav-link active" href="#user">ユーザー側の使い方 /</a>
            <a class="nav-item nav-link active" href="#admin">お店側の使い方 /</a>
            <a class="nav-item nav-link active" href="#technology">使用ツール紹介 /</a>
            <a class="nav-item nav-link active" href="#use">実際に使用してみる</a>
        </div>
    </div>
</nav>


  <!----------------- EatingAppとは ---------------->
<div class="pb-4">  
    <div id="EatingApp">
        <h1 class="title py-3">Eating Appとは</h1>
    </div>
    
    <div class="container">
        <div class="text-center">
            <h6 class="font-weight-bold text-green">ホットペッパーは飲食点検索機能!</h6>
            <h6 class="font-weight-bold text-green">飲食店とお客様との距離をより近くするためのツールです。</h6>
            <h4 class="font-weight-bold">EatingAppはホットペッパーAPIを使用した飲食店検索予約システムです。</h4>
            <h4 class="font-weight-bold">お店側に気になることや質問をすることができます。</h4>
        </div>
        <div class="text-center">
          <a class="btn btn-success btn-lg" href="#use">まずは使用する</a>
        </div>
    </div>
</div>
  <!----------------- ユーザーの使い方 ---------------->

<div class="bg-dot pb-5">
    <div id="user">
        <h1 class="title py-3">ユーザーの使い方</h1>
    </div>

    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            <img class="img-step-title"src="{{ asset('image/step_title.png') }}" alt="title">
        </div>

        <div class="row pt-4">
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step1.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/user_step1_main.png') }}" alt="step1_main">
            </div>
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step2.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/user_step2_main.png') }}" alt="step2_main">
            </div>
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step3.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/user_step3_main.png') }}" alt="step3_main">
            </div>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="d-flex justify-content-center">
          <img class="img-user-title" src="{{ asset('image/user_title.png') }}" alt="user_title">
    </div>
    <div class="row">
        <div class="col-md text-center">
            <img class="img-step-main p-2" src="{{ asset('image/user_top.png') }}" alt="user_top">
        </div>
        <div class="col-md text-center">
            <img class="img-step-main p-2" src="{{ asset('image/user_search.png') }}" alt="user_search">
        </div>
    </div>
    <div class="row">
        <div class="col-md text-center">
          <img class="img-step-main p-2" src="{{ asset('image/user_chat.png') }}" alt="user_chat">
        </div>
        <div class="col-md text-center">
          <img class="img-step-main p-2" src="{{ asset('image/user_reservation.png') }}" alt="user_reservation">
        </div>
    </div>
</div>

  <!----------------- お店側の使い方 ---------------->
<div class="bg-white pb-5">

    <div class="bg-dot pb-5">
      <div id="admin">
        <h1 class="title py-3">お店側の使い方</h1>
      </div>

      <div class="container pt-4">
        <div class="d-flex justify-content-center">
          <img class="img-step-title"src="{{ asset('image/step_title.png') }}" alt="title">
        </div>

        <div class="row pt-4">
          <div class="col-md text-center">
            <img class="img-step p-2" src="{{ asset('image/step1.png') }}" alt="step1">
            <img class="img-step-main p-3" src="{{ asset('image/admin_step1_main.png') }}" alt="step1_main">
          </div>
          <div class="col-md text-center">
            <img class="img-step p-2" src="{{ asset('image/step2.png') }}" alt="step1">
            <img class="img-step-main p-3" src="{{ asset('image/admin_step2_main.png') }}" alt="step2_main">
          </div>
          <div class="col-md text-center">
            <img class="img-step p-2" src="{{ asset('image/step3.png') }}" alt="step1">
            <img class="img-step-main p-3" src="{{ asset('image/admin_step3_main.png') }}" alt="step3_main">
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center pb-3">
            <img class="img-admin-title" src="{{ asset('image/admin_title.png') }}" alt="admin_title">
        </div>
        <div class="row">
            <div class="col-md pr-2">
                <h3 class="text-dark font-weight-bold">過去の来店状況をグラフで確認することができて、<span class="text-success">分かりやすい！</span></h3>
                <p>より良いお店作りに欠かせないのは、自分のお店を知るということです。しかし、普段忙しくてじっくり自分のお店と向き合うことができないというのが現実。そこで、グラフを用いることでお店の状況を手軽に知ることができます。</p>
                <p>※現在は、来客数の推移、１週間の来客数（お客様自身とEatingApp全体の平均）、男女比率、年齢別比率です。今後拡張していく予定です。</p>
            </div>
            <div class="col-md-6 text-center p-0">
                <img class="img-sucreen" src="{{ asset('image/admin_chart.png') }}" alt="admin_chart">
            </div>
        </div>
        <div class="row">
            <div class="col-md pt-2 order-md-1">
                <h3 class="text-dark font-weight-bold">予約状況を一目で<span class="text-success">チェック！</span></h3>
                <p>予約情報は簡単に確認することができます。月ごと週ごと日にちごとに予約を確認することができます。月は１日で来店する合計人数と組数が表示されます。週ごとと日付ごとの予約状況で、来店されるお客様の詳細情報を確認することができます。</p>
            </div>
            <div class="col-md-6 text-center p-0 order-md-0">
                <img class="img-sucreen" src="{{ asset('image/admin_reservation.png') }}" alt="admin_chart">
            </div>
        </div>
        <div class="row">
            <div class="col-md pr-2 pt-2">
                <h3 class="text-dark font-weight-bold">チャット機能でお客様と<span class="text-success">より近い距離で！</span></h3>
                <p>お客様の不安や疑問を、質問しやすい状況を作ることで、より近い距離で接することが可能です。このチャット機能をご利用していただいて、ぜひお客様との深い信頼関係を気づいて下さい。また、キャンペーン情報なども発信することで、集客率を高めることも可能です。</p>
                <p>※現在は、お店のキャンペーン情報を送信することはできません。</p>
            </div>
            <div class="col-md-6 text-center p-0">
                <img class="img-sucreen" src="{{ asset('image/admin_chat.png') }}" alt="admin_chart">
            </div>
        </div>
        <div class="row">
            <div class="col-md pt-2 order-md-1">
                <h3 class="text-dark font-weight-bold">お店情報も手軽に<span class="text-success">修正可能！</span></h3>
                <p>万が一にお店を改装した時でも大丈夫です。設定情報を簡単に変更することができます。また、お店の登録写真を変更したいという方時でも有効です！より効果的な写真を使用して、お客様の興味を唆らせて下さい。</p>
            </div>
            <div class="col-md-6 text-center p-0 order-md-0">
                <img class="img-sucreen" src="{{ asset('image/admin_setting.png') }}" alt="admin_chart">
            </div>
        </div>
    </div>
</div>
  
  <!----------------- 使用ツール ---------------->
<div class="bg-yellowgreen">
    <div id="technology">
        <h1 class="title py-3">使用ツール</h1>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">Figma</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/figma.png') }}" alt="figma">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">drawSQL</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/drawsql.png') }}" alt="drawsql">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">Laravel6</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/laravel.jpeg') }}" alt="laravel">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">Bootstrap4</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/bootstrap4.png') }}" alt="bootstrap4">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">Font Awesome</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/fontawesome.png') }}" alt="fontawesome">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">TinyJPEG</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/tiny.jpeg') }}" alt="tiny">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">AWS S3</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/AWSS3.jpeg') }}" alt="AWSS3">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">jQuery</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/jquery.png') }}" alt="jQuery">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">PUSHER</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/pusher.jpeg') }}" alt="PUSHER">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">chart.js</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/chartjs.png') }}" alt="chart.js">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">FullCalendar</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/fullcalendar.png') }}" alt="fullcalendar">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">HOT PEPPER API</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/HOTPEPPER_API.jpeg') }}" alt="HOTPEPPER_API">
            </div>
        </div>
        <div class="row">
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">Guzzle</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/Guzzle.png') }}" alt="Guzzle">
            </div>
            <div class="col-md bg-white m-4">
                <div class="pt-3">
                    <h1 class="rounded-pill bg-green mx-5">MAMP</h1>
                </div>
                <img class="img-technology" src="{{ asset('image/MAMP.png') }}" alt="MAMP">
            </div>
        </div>
    </div>
</div>

  <!----------------- 実際に使用 ---------------->

<div id="use">
        <h1 class="title py-3">実際に使用してみる</h1>
</div>

<div class="container">
    <div class="pt-3">
        <a class="btn btn-primary btn-lg btn-block" href ="login">ログイン</a>
    </div>
    <div class="pt-3">
        <a class="btn btn-outline-primary btn-lg btn-block" href ="register">新規登録</a>
    </div>
    <div class="pt-3">
        <a href="login/admin" class="btn btn-primary btn-lg btn-block">お店側のログインはこちらから</a>
    </div>
    <div class="pt-3">
        <a href="register/admin" class="btn btn-outline-primary btn-lg btn-block">お店側の新規登録はこちらから</a>
    </div>
</div>

<footer>
　<p class="text-center text-white font-weight-bold bg-darkgreen py-2">Copyright &copy; Matsumoto Tetsuya. 2021.</p> 
</footer>
<script>

scrollTop('js-button', 500);

function scrollTop(elem,duration) {
  let target = document.getElementById(elem);
  target.addEventListener('click', function() {
    let currentY = window.pageYOffset; 
    let step = duration/currentY > 1 ? 10 : 100;
    let timeStep = duration/currentY * step;
    let intervalID = setInterval(scrollUp, timeStep);

    function scrollUp(){
      currentY = window.pageYOffset;
      if(currentY === 0) {
          clearInterval(intervalID);
      } else {
          scrollBy( 0, -step );
      }
    }
  });
}
</script>
</body>
</html>

