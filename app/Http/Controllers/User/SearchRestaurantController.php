<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class SearchRestaurantController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function keyword(Request $request)
    {
        // インスタンス生成
        $client = new Client();

        // HTTPリクエストメソッド
        $method = 'GET';

        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');
        // APIキーや検索ワードなどの設定を記述
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => $request->keyword,
                'lat' => $request->latitude,
                'lng' => $request->longitude,
                'range' => 5,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];
        // dd($restaurants);

        // index.blade.phpを表示する
        return view('user_screen.search_keyword', ['restaurants' => $restaurants]);
    }

    public function genre(Request $request) 
    {
        // dd($request->food);
        // インスタンス生成
        $client = new Client();

        // HTTPリクエストメソッド
        $method = 'GET';

        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');
        // APIキーや検索ワードなどの設定を記述
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'genre' => ['code' => $request->food,],
                'address' => $request->prefectures,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];
        // dd($restaurants);

        // index.blade.phpを表示する
        return view('user_screen.search_keyword', ['restaurants' => $restaurants]);

    }
}
