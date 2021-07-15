<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Admin;
use App\Model\Message;
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
        if(Auth::guard()->check())
        {
            $loginId = Auth::id();
            $send = User::find($loginId)->userid;
            $send_name = User::find($loginId)->name;
            $recieve_name_id = Admin::where('shopid', $recieve)->get(['name', 'id']);
        }
        elseif(Auth::guard('admin')->check())
        {
            $loginId = Auth::guard('admin')->id();
            $send = Admin::find($loginId)->shopid;
            $send_name = Admin::find($loginId)->name;
            $recieve_name_id = User::where('userid', $recieve)->get('name');
        }
        else
        {
            return redirect('/');
        }
        
        $param = [
            'send' => $send,
            'recieve' => $recieve,
        ];
        // dd($recieve_name[0]['name']);
        // 送受信のメッセージを取得する
        $send_message = Message::where('send' , $send)->where('recieve' , $recieve);
        $send_message->orWhere(function($query) use($send , $recieve){
            $query->where('send' , $recieve);
            $query->where('recieve' , $send);
        });
        $messages = $send_message->get();
        return view('chat' , ['param' => $param, 'messages' => $messages, 'send_name' => $send_name, 'recieve_name' => $recieve_name_id[0]['name'], 'admin_id' => $recieve_name_id[0]['id']]);
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
        //日付と時間を保存
        $request['created_at'] = date('m/d H:i');
        //送信者の名前を保存
        if(Auth::guard()->check())
        {
            $send_user = User::where('userid', $request->input('send'))->get('name');
            $request['send_user'] = $send_user[0]['name'];
        }
        elseif(Auth::guard('admin')->check())
        {
            $send_admin = Admin::where('shopid', $request->input('send'))->get('name');
            $request['send_admin'] = $send_admin[0]['name'];
        }
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
