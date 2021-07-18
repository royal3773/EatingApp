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
            <a class="nav-item nav-link active" href="#">お店側の使い方 /</a>
            <a class="nav-item nav-link active" href="#">使用技術紹介 /</a>
            <a class="nav-item nav-link active" href="#">実際に使用してみる</a>
        </div>
    </div>
</nav>


  <!----------------- EatingAppとは ---------------->
<div class="pb-4">  
    <div id="EatingApp">
        <h1 class="title">Eating Appとは</h1>
    </div>
    
    <div class="container">
        <div class="text-center">
            <h6 class="font-weight-bold text-green">ホットペッパーは飲食点検索機能!</h6>
            <h6 class="font-weight-bold text-green">飲食店とお客様との距離をより近くするためのツールです。</h6>
            <h4 class="font-weight-bold">EatingAppはホットペッパーAPIを使用した飲食店検索予約システムです。</h4>
            <h4 class="font-weight-bold">お店側に気になることや質問をすることができます。</h4>
        </div>
        <div class="text-center">
          <a class="btn btn-success btn-lg" href="#">まずは使用する</a>
        </div>
    </div>
</div>
  <!----------------- ユーザーの使い方 ---------------->

<div class="bg-dot pb-5">
    <div id="user">
        <h1 class="title">ユーザーの使い方</h1>
    </div>

    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            <img class="img-step-title"src="{{ asset('image/step_title.png') }}" alt="title">
        </div>

        <div class="row pt-4">
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step1.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/step1_main.png') }}" alt="step1_main">
            </div>
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step2.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/step2_main.png') }}" alt="step2_main">
            </div>
            <div class="col-md text-center">
                <img class="img-step p-2" src="{{ asset('image/step3.png') }}" alt="step1">
                <img class="img-step-main p-3" src="{{ asset('image/step3_main.png') }}" alt="step3_main">
            </div>
        </div>
    </div>
</div>


    <div>
        <a class="btn btn-primary btn-lg btn-block" href ="login">ログイン</a>
    </div>
    <div>
        <a class="btn btn-outline-primary btn-lg btn-block" href ="register">新規登録</a>
    </div>
    <div>
        <a href="login/admin" class="btn btn-primary btn-lg btn-block">お店側のログインはこちらから</a>
    </div>
    <div>
        <a href="register/admin" class="btn btn-outline-primary btn-lg btn-block">お店側の新規登録はこちらから</a>
    </div>
</body>
</html>