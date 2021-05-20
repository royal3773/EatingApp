@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
 
    {{--  チャットルーム  --}}
    <div id="room">
        @foreach($messages as $key => $message)
            {{--   送信したメッセージ  --}}
            @if($message->send == \Illuminate\Support\Facades\Auth::id())
                <div class="send" style="text-align: right">
                    <p>{{$message->message}}</p>
                </div>
 
            @endif
 
            {{--   受信したメッセージ  --}}
            @if($message->recieve == \Illuminate\Support\Facades\Auth::id())
                <div class="recieve" style="text-align: left">
                    <p>{{$message->message}}</p>
                </div>
            @endif
        @endforeach
    </div>
 
    <form name="form" >
    
        <textarea name="message" style="width:100%"></textarea>
        <button type="button"　 id="btn_send">送信</button>
        
    </form>

    <input type="hidden" name="send" value="{{$param['send']}}">
    <input type="hidden" name="recieve" value="{{$param['recieve']}}">
    <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
 
</div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script type="text/javascript">

       //ログを有効にする
       Pusher.logToConsole = true;
 
       var pusher = new Pusher('64fd8c552ef95fa6e67e', {
           cluster  : 'ap3',
           encrypted: true
       });
       //サブスクライブするチャンネルを指定後、ChatMessageRecievedをバインドしている
       //chat3が表示されなくなる
       var channel = pusher.subscribe('chat');
       channel.bind('ChatMessageRecieved', function(data) {
       console.log('received a message');
       console.log(data);
       });
 
       //購読するチャンネルを指定
       var pusherChannel = pusher.subscribe('chat');
 
       //イベントを受信したら、下記処理
       pusherChannel.bind('chat_event', function(data) {
 
           let appendText;
           //input内のnameがloginの値を取得
           let login = $('input[name="login"]').val();
           //もし、sendとloginの値が同じであれば右に表示する
           if(data.send === login){
               appendText = '<div class="send" style="text-align:right"><p>' + data.message + '</p></div> ';
            //もし、recieveとloginの値が同じであれば左に表示する
           }else if(data.recieve === login){
               appendText = '<div class="recieve" style="text-align:left"><p>' + data.message + '</p></div> ';
           }else{
               return false;
           }
 
           // メッセージを表示
           $("#room").append(appendText);
        //    if(data.send === login){
        //        console.log('chat機能');
        //        Push.create('新着メッセージ');
        //        console.log('push機能送信');
        //    }
           if(data.recieve === login){
               // ブラウザへプッシュ通知
               Push.create("新着メッセージ",
                   {
                       body: data.message,//メッセージを表示
                       timeout: 8000,//8秒
                       onClick: function () {
                           window.focus();//フォーカス
                           this.close();//通知を閉じる
                       }
                   })

 
           }
 
 
       });
    window.addEventListener('DOMContentLoaded', function () {

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }});
            
            // メッセージ送信
            $('#btn_send').on('click' , function(){
                $.ajax({
                    type : 'POST',
                    url : '/chat/send',
                    data : {
                        message : $('textarea[name="message"]').val(),
                        send : $('input[name="send"]').val(),
                        recieve : $('input[name="recieve"]').val(),
                    }
                }).done(function(result){
                    $('textarea[name="message"]').val('');
                }).fail(function(result){
                    
                });
            });
        });
    </script>
 
@endsection