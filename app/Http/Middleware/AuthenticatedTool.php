<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Store;
use Illuminate\View\View;

class AuthenticatedTool
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);

		$message = "(DEBUG!)" . __CLASS__ . "---->" . __FUNCTION__ . "[" . __LINE__ . "]";
		$message.= $this->auth->user()->role;
		logger($message);		
        
        if($this->auth->check()){
            //admin権限, store権限なら
            if($this->auth->user()->role == "admin" || $this->auth->user()->role == "store"){
                //store権限なら
                if($this->auth->user()->role == "store"){
	        		$path = \Request::path();

	        		$message = "(DEBUG!)" . __CLASS__ . "---->" . __FUNCTION__ . "[" . __LINE__ . "]";
	        		$message.= "path : $path";
	        		logger($message);
	        		
	        		//ページが施設管理なら
	        		if(preg_match("/^tool\/store.*/", $path)){
		    			return redirect('/tool');
		    			exit;
	        		}
	        		//ページが画像管理なら
	        		if(preg_match("/^tool\/image.*/", $path)){
		    			return redirect('/tool');
		    			exit;
        			}
        		}

        		$stores = Store::orderBy('id')->pluck('storename','id');
        		$user_store = @$stores[$this->auth->user()->store_id];

                $all_storeId = @array_search('全施設', $stores->toArray());
                $stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');
                $all_store_logo = @$stores_imgd[$all_storeId];
                $all_store_logo = json_decode($all_store_logo, true);
                $all_store_logo = $all_storeId . "/" . @$all_store_logo[0]['filename'];

        		\View::share('user_store', $user_store);
                \View::share('all_store_logo', $all_store_logo);
            }
        	//user権限の場合
        	else{
        		//フロントTOPにリダイレクトします。
		    	return redirect('/');
		    	exit;
        	}
        }

        return $next($request);
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        throw new AuthenticationException;
    }
}
