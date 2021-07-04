<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
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
        $admin = Auth::user();
        return view('admin_screen.setting', ['admin' => $admin]);
    }
    public function edit()
    {
        $admin = Auth::user();
        return view('admin_screen.setting_edit', ['admin' => $admin]);
    }
    public function update_text(Request $request, $admin_id) 
    {
        Validator::make($request->all(), Admin::$rules_text, Admin::$message_text)->validate();
        $admin = Admin::find($admin_id);
        $form = $request->all();
        unset($form['_token']);
        $admin->fill($form)->save();
        return redirect('/admin/setting');
    }
    public function update_image(Request $request, $admin_id)
    {
        $admin = Admin::find($admin_id);
        $admin_image = str_replace('https://eatinapp.s3.ap-northeast-1.amazonaws.com/', '', $admin->image);
        $file_delete = Storage::disk('s3')->delete($admin_image);
        $file = $request->file('image');
        $path = Storage::disk('s3')->put('/admin', $file, 'public'); // Ｓ３にアップ
        $request['image_url'] = Storage::disk('s3')->url($path);
        $form = $request->all();
        unset($form['_token']);
        // dump($admin->image);
        // dd($request['image_url']);
        $admin->image = $request['image_url'];
        $admin->save();
        return redirect('/admin/setting');
    }
    public function update_password(Request $request, $admin_id)
    {
        $form = $request->all();
        $admin = Admin::find($admin_id);
        $passcheck = Hash::check($form['old_password'], $admin->password);
        $validator = Validator::make(['old_password' => $passcheck],['old_password' => 'accepted'],['現在のパスワードが一致しません'])->validate();
        $validator = Validator::make($request->all(), Admin::$rules_password, Admin::$message_password)->validate();
        unset($form['_token']);
        $form['password'] = Hash::make($form['password']);
        $admin->fill($form)->save();
        session()->flash('flash_message', "ご入力に誤りがあります。もう一度ご確認の上再度変更して下さい。");
        return redirect('/admin/setting');
    }
}
