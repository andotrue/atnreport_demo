<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedTool
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
    	$message = "(DEBUG!)" . __FILE__ . "---->" . __FUNCTION__ . ":" . __LINE__;
    	$message .= "\n\r" . var_export($next,true);
    	logger($message);
        
        logger(Auth::guard($guard)->check());
    	if (Auth::guard($guard)->check()) {
    		//var_dump(Auth::user()->role);
        	if(Auth::user()->role == "admin"){
        		return $next($request);
        	}
        	else{
        		//権限エラーページにリダイレクト
        		//return redirect('/tool');
        		echo "権限なし";
        		exit;
        	}
        }
        else{
        	return redirect('/login');

        	/*
        	// アプリケーションによりリクエストが処理された後にタスクを実行します。
        	// https://readouble.com/laravel/5.1/ja/middleware.html
        	$response = $next($request);
        	// アクションを取るコードをここに記述
        	return $response;
        	*/
        }
    }
}
