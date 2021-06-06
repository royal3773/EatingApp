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

    public function store(Request $request, $favorite)
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
}
