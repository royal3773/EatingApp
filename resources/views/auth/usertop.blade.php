<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/usertop.css') }}" rel="stylesheet">
  
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
  <a class="navbar-brand">目次</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>




    
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