<?php

namespace App\Http\Controllers\Api;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index () 
    {
        $users = User::all();
        return $users;
    }
    public function get($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function pget(Request $request)
    {
        $take = $request->take;
        $page = ($request->page * $take) - $take;
        if(empty($request->take)){
            return 1;
        }elseif(empty($request->page)) {
            return 1;
        }
        $user = User::skip($page)->take($take)->get();
        // $user = User::find($request->id);
        return $user;
    }
    public function register(Request $request)
    {
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->birthday = $request->birthday;
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->image = $request->image;

        $user->save();
        return 0;
    }
}
