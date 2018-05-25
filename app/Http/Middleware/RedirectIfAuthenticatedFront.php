<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedFront
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
    		var_dump(Auth::guard($guard)->check());
    		var_dump(Auth::user()->role);
//        	if(Auth::user()->role == "admin"){
	    		return $next($request);
    			//return redirect('/');
	    	    //exit;
//        	}
/*
        	else{
        		//権限エラーページにリダイレクト
        		//return redirect('/tool');
        		echo "権限なし";
        		exit;
        	}
*/
        }
        else{
        	return redirect('/front/login');
    	    exit;
        }
    }
}
