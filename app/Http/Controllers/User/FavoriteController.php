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
        $favorites = Favorite::where('user_id', $user_id)->get('restaurant_id');
        $favorites_id = $favorites->toArray();
        // dd($favorites[0]['restaurant_id']);
        // インスタンス生成
        $client = new Client();

        // HTTPリクエストメソッド
        $method = 'GET';

        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');
        
        $counter = 0;
        $restaurants = [];
        foreach($favorites_id as $favorite_id){
            // dd('test');
            // APIキーや検索ワードなどの設定を記述
            // dump($favorite_id['restaurant_id']);
            $options = [
                'query' => [
                    'key' => config('hotpepper.api_key'),
                    'id' => $favorite_id['restaurant_id'],
                    'format' => 'json',
                ],
            ];
            // dump($options);
            // HTTPリクエストを送信
            $response = $client->request($method, self::REQUEST_URL, $options);
            
            // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
            $restaurant = json_decode($response->getBody(), true)['results'];
            $restaurants[] = $restaurant;
            // array_merge_recursive($restaurants, json_decode($response->getBody(), true)['results']);
            // dump($restaurants);
            // $counter++;
            // dump($."アイウエオ"."$counter");
        }
            // dd($restaurants);
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
