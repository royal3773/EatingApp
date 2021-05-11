<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *認証が完了するとホームにリダイレクトされる処理
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
        $this->middleware('guest')->except('logout');

        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:6'
        ]);
        //guard('admin')によりconfig/auth.phpのguardsのadmin配列を使用->attemptでnameとパスワードでレコードを取得rememberで比較している。
        //rememberを使用して、ログイン維持を持たせている。
        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {
            //認証機能に引かかる前にアクセル使用としたページへ飛ばす
            return redirect()->intended('/admin');
        }
        //ログインが失敗すると前のページに戻すその時入力したデータ情報もの一緒に返している、。
        return back()->withInput($request->only('name', 'remember'));
    }
}
