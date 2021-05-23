<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Message;
use App\Mail\SampleNotification;
use App\Events\ChatMessageRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $recieve)
    {
        if(Auth::guard('admin')->check())
        {
            $loginId = Auth::guard('admin')->id();
        }
        elseif(Auth::guard()->check())
        {
            $loginId = Auth::id();
        }
        else
        {
            return redirect('/');
        }

        $param = [
          'send' => $loginId,
          'recieve' => $recieve,
        ];
        // 送信のメッセージを取得する
        $send_message = Message::where('send' , $loginId)->where('recieve' , $recieve);
        // 受信のメッセージを取得する
        $send_message->orWhere(function($query) use($loginId , $recieve){
            $query->where('send' , $recieve);
            $query->where('recieve' , $loginId);
        });
        $messages = $send_message->get();

        return view('chat' , ['param' => $param , 'messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = new Message;
        // リクエストパラメータを保存
            $messages->send = $request->input('send');
            $messages->recieve = $request->input('recieve');
            $messages->message = $request->input('message');
        $messages->save();
        // Message::insert($insertParam);
        
        // イベント発火chatmessagerecieved.phpに書いてある処理を呼び出す
        event(new ChatMessageRecieved($request->all()));

        return redirect('/chat'.'/'.$request->recieve);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
