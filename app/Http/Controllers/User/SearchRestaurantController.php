<?php

namespace App\Http\Controllers\User;

use App\Model\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;


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

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get(['restaurant_id']);
        $start=0;
        $lat = $request->latitude;
        $lng = $request->longitude;
        $keyword = $request->keyword;
        
        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites ,'start' => $start, 'lat' => $lat, 'lng' => $lng, 'keyword' => $keyword]);
    }
    public function keyword_pagination($keyword, $start)
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
                'keyword' => $keyword,
                'start' => $start,
                'range' => 5,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get(['restaurant_id']);
        $keyword = $keyword;
        
        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites ,'start' => $start, 'keyword' => $keyword]);
    }
    public function lat_lng_pagination($lat, $lng, $start)
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
                'lat' => $lat,
                'lng' => $lng,
                'start' => $start,
                'range' => 5,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get(['restaurant_id']);
        
        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites ,'start' => $start, 'lat' => $lat, 'lng' => $lng]);
    }

    public function genre(Request $request) 
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
                'genre' => $request->food,
                'address' => $request->prefectures,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get();
        $genre = $request->food;
        $address = $request->prefectures;
        $start = 0;

        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites, 'genre' => $genre, 'address' => $address, 'start' => $start]);

    }
    public function genre_pagination($genre, $address, $start) 
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
                'genre' => $genre,
                'address' => $address,
                'start' => $start,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get();

        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites, 'genre' => $genre, 'address' => $address, 'start' => $start]);

    }
    public function special_feature(Request $request)
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
                'special' => $request->special_feature,
                'address' => $request->prefectures,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get();
        $special = $request->special_feature;
        $address = $request->prefectures;
        $start = 0;

        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites, 'special' => $special, 'address' => $address, 'start' => $start]);
    }
    public function special_pagination($special, $address, $start)
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
                'special' => $special,
                'address' => $address,
                'start' => $start,
                'count' => 10,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get();

        return view('user_screen.search_keyword', ['restaurants' => $restaurants, 'favorites' => $favorites, 'special' => $special, 'address' => $address, 'start' => $start]);
    }
}
