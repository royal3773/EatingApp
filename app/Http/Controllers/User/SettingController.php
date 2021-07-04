<?php

namespace App\Http\Controllers\User;

use App\Model\User;
use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



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
    public function update_name(Request $request, $user_id) 
    {
        Validator::make($request->all(), User::$rules_name, User::$message_name)->validate();
        $user = User::find($user_id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
    public function edit_email()
    {
        $user_email = Auth::user()->email;
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_email' => $user_email, 'user_id' => $user_id]);
    }
    public function update_email(Request $request, $user_id)
    {
        Validator::make($request->all(), User::$rules_email, User::$message_email)->validate();
        $user = User::find($user_id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
    public function edit_password()
    {
        $user_password = "password";
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_password' => $user_password, 'user_id' => $user_id]);
    }
    public function update_password(Request $request, $user_id)
    {
        $form = $request->all();
        $user = User::find($user_id);
        $passcheck = Hash::check($form['old_password'], $user->password);
        $validator = Validator::make(['old_password' => $passcheck],['old_password' => 'accepted'],['現在のパスワードが一致しません'])->validate();
        Validator::make($request->all(), User::$rules_password, User::$message_password)->validate();
        unset($form['_token']);
        $form['password'] = Hash::make($form['password']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
    public function edit_tel()
    {
        $user_tel = Auth::user()->tel;
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_tel' => $user_tel, 'user_id' => $user_id]);
    }
    public function update_tel(Request $request, $user_id)
    {
        Validator::make($request->all(), User::$rules_tel, User::$message_tel)->validate();
        $user = User::find($user_id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
    public function edit_address()
    {
        $user_address = Auth::user()->address;
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_address' => $user_address, 'user_id' => $user_id]);
    }
    public function update_address(Request $request, $user_id)
    {
        Validator::make($request->all(), User::$rules_address, User::$message_address)->validate();
        $user = User::find($user_id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user/setting');
    }
    public function edit_image()
    {
        $user_image = Auth::user()->image;
        $user_id = Auth::id();
        return view('user_screen.setting_edit_update', ['user_image' => $user_image, 'user_id' => $user_id]);
    }
    public function update_image(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user_image = str_replace('https://eatinapp.s3.ap-northeast-1.amazonaws.com/user/', '', $user->image);
        $file_delete = Storage::disk('s3')->delete('user/'.$user_image);
        $file = $request->file('image');
        $path = Storage::disk('s3')->put('/user', $file, 'public'); // Ｓ３にアップ
        $request['image_url'] = Storage::disk('s3')->url($path);
        $form = $request->all();
        unset($form['_token']);
        $user->image = $request['image_url'];
        $user->save();
        return redirect('/admin/setting');
    }
}
