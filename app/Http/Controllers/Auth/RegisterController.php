<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *Userモデルで設定したバリデーションとメッセージを引数として渡している。
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, User::$rules, User::$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {//createメソッドを使用して、fillableで指定した値に一括代入する
        $data['image_url'] = NULL;
        if(isset($data['image'])){
            $file = $data['image'];
            $path = Storage::disk('s3')->put('/user', $file, 'public'); // Ｓ３にアップ
            $data['image_url'] = Storage::disk('s3')->url($path);
        }

        $data['userid'] = 'user'.(mt_rand(100000000,999999999)*10+mt_rand(0,9));
        return User::create([
            'userid' => $data['userid'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'sex' => $data['sex'],
            'tel' => $data['tel'],
            'address' => $data['address'],
            'image' => $data['image_url'],
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.adminregister');
    }

    protected function validatorAdmin(array $data)
    {
        //バリデータを作成している
        return Validator::make($data, Admin::$rules, Admin::$message);
    }

    protected function createAdmin(Request $request)
    {
        $data['image_url'] = NULL;
        if(isset($request['image']))
        {
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('/admin', $file, 'public'); // Ｓ３にアップ
            $request['image_url'] = Storage::disk('s3')->url($path);
        }
        $this->validatorAdmin($request->all())->validate();
        $request['shopid'] = 'admin'.(mt_rand(100000000,999999999)*10+mt_rand(0,9));
        $admin = Admin::create([
            'shopid' => $request['shopid'],
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'mail' => $request['mail'],
            'tel' => $request['tel'],
            'address' => $request['address'],
            'image' => $request['image_url'],
        ]);
        return redirect()->intended('login/admin');
    }
}
