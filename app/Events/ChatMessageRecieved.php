<?php
 
namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
 
class ChatMessageRecieved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    protected $message;
    protected $request;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }
 
    /**
     * イベントをブロードキャストすべき、チャンネルの取得
     *　クライアントから接続するためのチャンネル名を設定
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        dump('chat1');
        return new Channel('chat');
 
    }
 
    /**
     * ブロードキャストするデータを取得
     *　クライアントに送るデータを定義
     * @return array
     */
    public function broadcastWith()
    {
 
        dump('chat2');
        return [
            'message' => $this->request['message'],
            'send' => $this->request['send'],
            'recieve' => $this->request['recieve'],
        ];
    }
 
    /**
     * イベントブロードキャスト名
     *として放送
     * @return string
     */
    public function broadcastAs()
    {
        dump('chat3');
        return 'chat_event';
    }
}