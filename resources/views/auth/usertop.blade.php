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
    <div class="box">
        <img class="img-fluid" alt="cake" src="{{ asset('image/cake.jpg') }}">
        <p class="text-center">Eating App</p>
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