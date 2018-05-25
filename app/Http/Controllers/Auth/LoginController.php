<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Store;

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
     * Where to redirect users after login / registration.
     * 認証後のリダイレクト先の場所を定義
     * @var string
     */
    protected $redirectTo = '/tool';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$message = "(DEBUG!)" . __FILE__ . "---->" . __FUNCTION__ . ":" . __LINE__;
    	logger($message);

    	//$this->authenticate();
        $this->middleware('guest', ['except' => 'logout']);
    }

    //認証用のキー(+ password)とするカラムを設定
    //↓のmethodをOverride
    //vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers.php
    public function username()
    {
    	//return 'email';
    	return 'name';
    }

    //↓のmethodをOverride
    //vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers.php
    public function showLoginForm()
    {
        $stores = Store::orderBy('id')->pluck('storename','id');

        $all_storeId = @array_search('全施設', $stores->toArray());
        $stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');
        $all_store_logo = @$stores_imgd[$all_storeId];
        $all_store_logo = json_decode($all_store_logo, true);
        $all_store_logo = $all_storeId . "/" . @$all_store_logo[0]['filename'];

        \View::share('page_title', "ログイン画面");
        \View::share('all_store_logo', $all_store_logo);
        return view('auth.login');
    }

    //↓のmethodをOverride
    //vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers.php
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('名前またはパスワードが違います'),
            ]);
    }


    public function logout(Request $request)
    {
    	echo $referer = $request->headers->get('referer');
    	$referers = parse_url($referer);
    	$path = $referers['path'];
    	if(!preg_match('/^\/tool*/', $path)) $this->redirectTo = "/";

    	$this->guard()->logout();
    	$request->session()->flush();
    	$request->session()->regenerate();
    	return redirect($this->redirectTo);
    }
}
