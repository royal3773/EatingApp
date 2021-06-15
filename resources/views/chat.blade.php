@extends('layouts.user_app')

@section('navtitle')
    <a class="navbar-brand" href="javascript:history.back()"><i class="fas fa-chevron-left"></i> {{ $recieve_name }}</a>
@endsection

@section('style')
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container pb-3">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
    {{--  チャットルーム  --}}
    <div id="room" class="mb-5">
        @foreach($messages as $key => $message)
            {{--------------   送信したメッセージ  -------------------}}
            @if($message->send == \Illuminate\Support\Facades\Auth::id())
                <div class="d-flex align-items-center justify-content-end">
                    <div class="pr-2 pl-1">
                        <span class="small">{{ $send_name }} {{ $message['created_at']->format('m/d H:i') }}</span>
                    </div>
                </div>
                <div class="speech-bubble">
                    <div class="sb-bubble sb-line2 sb-right">
                        <p class="h5">{{ $message->message }}</p>
                    </div>
                </div>
            @elseif($message->send == \Illuminate\Support\Facades\Auth::guard('admin')->id())
                <div class="d-flex align-items-center justify-content-end">
                    <div class="pr-2 pl-1">
                        <span class="small">{{ $send_name }} {{ $message['created_at']->format('m/d H:i') }}</span>
                    </div>
                </div>
                <div class="speech-bubble">
                    <div class="sb-bubble sb-line2 sb-right">
                        <p class="h5">{{ $message->message }}</p>
                    </div>
                </div>
            @endif
 
            {{-------------------   受信したメッセージ  ------------------------}}
            @if($message->recieve == \Illuminate\Support\Facades\Auth::id())
                <div class="d-flex align-items-center justify-content-start">
                    <div class="pr-2 pl-1">
                        <span class="small">{{ $recieve_name }} {{ $message['created_at']->format('m/d H:i') }}</span>
                    </div>
                </div>
                <div class="speech-bubble">
                    <div class="sb-bubble sb-line2 sb-left">
                        <p class="h5">{{ $message->message }}</p>
                    </div>
                </div>
            @elseif($message->recieve == \Illuminate\Support\Facades\Auth::guard('admin')->id())
                <div class="d-flex align-items-center justify-content-start">
                    <div class="pr-2 pl-1">
                        <span class="small">{{ $recieve_name }} {{ $message['created_at']->format('m/d H:i') }}</span>
                    </div>
                </div>
                <div class="speech-bubble">
                    <div class="sb-bubble sb-line2 sb-left">
                        <p class="h5">{{ $message->message }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
{{-------------------   メッセージ送信フォーム  ------------------------}}
<div class="fixed-bottom py-1 bg-form">
    <form name="form" class="form-inline row">
    
        <textarea name="message" class="col-7 m-1 rounded-pill"></textarea>
        <button type="button"　 class="btn btn-info btn-lg col-2 m-1 rounded-pill" id="btn_send"><i class="fas fa-paper-plane"></i></button>
        <button type="button"　 class="btn btn-info btn-lg col-2 m-1 rounded-pill" onclick="location.href='/user/reservation/{{$param['recieve']}}'"><i class="fas fa-calendar-check"></i></button>
    </form>
</div>
        
@auth
    <input type="hidden" name="send" value="{{$param['send']}}">
    <input type="hidden" name="recieve" value="{{$param['recieve']}}">
    <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
@endauth
@auth('admin')
    <input type="hidden" name="send" value="{{$param['send']}}">
    <input type="hidden" name="recieve" value="{{$param['recieve']}}">
    <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->id()}}">
@endauth
<input type="hidden" name="user_login" value="{{\Illuminate\Support\Facades\Auth::guard()->check()}}">
<input type="hidden" name="admin_login" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->check()}}">

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script type="text/javascript">

       //ログを有効にする
       Pusher.logToConsole = true;
       //pusherを指定
       var pusher = new Pusher("{{ config('pusher.api_key') }}", {
           cluster  : 'ap3',
           encrypted: true
       });
       //サブスクライブするチャンネルを指定後、ChatMessageRecievedをバインドしている
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
           
           let user_login = $('input[name="user_login"]').val();
           let admin_login = $('input[name="admin_login"]').val();
           //もし、sendとloginの値が同じであれば右に表示する
           if(1 == user_login){
                if(data.send === login){
                    appendText = '<div class="d-flex align-items-center justify-content-end">'
                               + '<div class="pr-2 pl-1">'
                               + '<span class="small">' + data.send_user + data.created_at + '</span>'
                               + '</div>'
                               + '</div>'
                               + '<div class="speech-bubble">'
                               + '<div class="sb-bubble sb-line2 sb-right">'
                               + '<p class="h5">' + data.message + '</p>'
                               + '</div>'
                               + '</div>';
                 //もし、recieveとloginの値が同じであれば左に表示する
                }else if(data.recieve === login){
                    appendText = '<div class="d-flex align-items-center justify-content-start">'
                               + '<div class="pr-2 pl-1">'
                               + '<span class="small">' + data.send_admin + data.created_at + '</span>'
                               + '</div>'
                               + '</div>'
                               + '<div class="speech-bubble">'
                               + '<div class="sb-bubble sb-line2 sb-left">'
                               + '<p class="h5">' + data.message + '</p>'
                               + '</div>'
                               + '</div>';
                }else{
                    return false;
                }
           }
           if(1 == admin_login){
                if(data.send === login){
                    appendText = '<div class="d-flex align-items-center justify-content-end">'
                               + '<div class="pr-2 pl-1">'
                               + '<span class="small">' + data.send_admin + data.created_at + '</span>'
                               + '</div>'
                               + '</div>'
                               + '<div class="speech-bubble">'
                               + '<div class="sb-bubble sb-line2 sb-right">'
                               + '<p class="h5">' + data.message + '</p>'
                               + '</div>'
                               + '</div>';
                 //もし、recieveとloginの値が同じであれば左に表示する
                }else if(data.recieve === login){
                    appendText = '<div class="d-flex align-items-center justify-content-start">'
                               + '<div class="pr-2 pl-1">'
                               + '<span class="small">' + data.send_user + data.created_at + '</span>'
                               + '</div>'
                               + '</div>'
                               + '<div class="speech-bubble">'
                               + '<div class="sb-bubble sb-line2 sb-left">'
                               + '<p class="h5">' + data.message + '</p>'
                               + '</div>'
                               + '</div>';
                }else{
                    return false;
                }
           }
           
 
           // メッセージを表示
           $("#room").append(appendText);
           
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
        //ポスト送信するときは下記を追記する
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