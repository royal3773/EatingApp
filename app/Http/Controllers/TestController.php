<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function index()
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
                'keyword' => '香川',
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
        return view('test', compact('restaurants'));
    }
    // ーーここまで追記ーー
}
