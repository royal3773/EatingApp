<?php

namespace App\Http\Controllers\User;

use App\Model\User;
use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        return view('user_screen.setting', ['user' => $user]);
    }
    public function show() 
    {
        $user = Auth::user();
        return view('user_screen.setting_show', ['user' => $user]);
    }
    public function edit() 
    {
        return view('user_screen.setting_edit');
    }
    public function edit_name() 
    {
        $user_name = Auth::user()->name;
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_name' => $user_name, 'user_id' => $user_id]);
    }
    protected function validator_update(array $data)
    {
        //バリデータを作成している
        return Validator::make($data, User::$rules, User::$message);
    }
    public function update_name(Request $request, $user_id) 
    {
        $validator = $this->validator_update($request->all())->validate();
        // if ($validator->fails() === false) {
            // return redirect('/user/setting/edit/name')->withErrors($validator)->withInput();
        // }
        $user = User::find($user_id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
}
