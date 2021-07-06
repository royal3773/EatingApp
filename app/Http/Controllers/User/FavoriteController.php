<?php

namespace App\Http\Controllers\User;

use App\Model\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function index()
    {
        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->paginate(5,'restaurant_id');
        
        // インスタンス生成
        $client = new Client();

        // HTTPリクエストメソッド
        $method = 'GET';

        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');
        
        $counter = 0;
        $restaurants = [];
        foreach($favorites as $favorite_id){
            // APIキーや検索ワードなどの設定を記述
            $options = [
                'query' => [
                    'key' => config('hotpepper.api_key'),
                    'id' => $favorite_id['restaurant_id'],
                    'format' => 'json',
                ],
            ];
            // HTTPリクエストを送信
            $response = $client->request($method, self::REQUEST_URL, $options);
            
            // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
            $restaurant = json_decode($response->getBody(), true)['results'];
            $restaurants[] = $restaurant;
        }
            $count = count($restaurants);
        return view('user_screen.favorite', ['restaurants' => $restaurants, 'count' => $count, 'favorites' => $favorites]);
    }

    public function store(Request $request)
    {
        $favorites = new Favorite;
        // リクエストパラメータを保存
            $favorites->restaurant_id = $request->input('restaurant_id');
            $favorites->user_id = $request->input('user_id');
        $favorites->save();
    }

    public function delete(Request $request)
    {
        $restaurant_id = $request->restaurant_id;
        Favorite::where('restaurant_id', $restaurant_id )->delete();
    }
}
