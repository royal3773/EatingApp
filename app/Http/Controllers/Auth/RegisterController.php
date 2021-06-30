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
        // dd($data);
        if(isset($data['image'])){
            // $contact_file = $request->file('file')->storeAs('public', $filenamefull);
            // $contact->file = basename($contact_file);
            $filenamefull = $data['image'];
            $contents = Storage::get('public/'.$filenamefull); //ファイルを読み取る
            Storage::disk('s3')->put($filenamefull, $contents, 'public'); // Ｓ３にアップ
            dd('if文');
        }
        dd('ストップ');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'sex' => $data['sex'],
            'tel' => $data['tel'],
            'address' => $data['address'],
            'image' => $data['image'],
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
        $this->validatorAdmin($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'mail' => $request['mail'],
            'tel' => $request['tel'],
            'address' => $request['address'],
            'image' => $request['image'],
        ]);
        return redirect()->intended('login/admin');
    }
}
