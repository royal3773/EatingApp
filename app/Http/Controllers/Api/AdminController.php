<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index () 
    {
        $admins = Admin::all();
        return $admins;
    }
    public function get($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }
    public function pget(Request $request)
    {
        $admin = Admin::find($request->id);
        return $admin;
    }
    public function register(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->mail = $request->mail;
        $admin->tel = $request->tel;
        $admin->address = $request->address;
        $admin->image = $request->image;

        $admin->save();
        return 0;
    }
}
