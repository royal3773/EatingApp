<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
    public function pget(UserRequest $request)
    {
        // $validator = Validator::make($request->all(), ['take' =>'numeric', 'page' => 'numeric']);
        // if(empty($request->take)){
        //     return 1;
        // }elseif(empty($request->page)) {
        //     return 1;
        // }elseif($validator->fails()) {
        //     return 1;
        // }
        $take = $request->take;
        $page = ($request->page * $take) - $take;
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
