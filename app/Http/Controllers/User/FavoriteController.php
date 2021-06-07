<?php

namespace App\Http\Controllers\User;

use App\Model\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        // dd($request);
        // dump('こちらはモデル前です');
        $favorites = new Favorite;
        // リクエストパラメータを保存
            $favorites->restaurant_id = $request->input('restaurant_id');
            $favorites->user_id = $request->input('user_id');
        $favorites->save();
            // dd('こちらはできていますか？');
    }

    public function delete(Request $request)
    {
        $restaurant_id = $request->restaurant_id;
        Favorite::where('restaurant_id', $restaurant_id )->delete();
    }
}
