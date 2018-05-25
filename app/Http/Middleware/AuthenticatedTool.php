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

        if($this->auth->check()){
        	//var_dump($this->auth->check());
        	if($this->auth->user()->role == "admin"
        			|| $this->auth->user()->role == "store"){
        		if($this->auth->user()->role == "store"){
	        		$path = \Request::path();
	        		//var_dump($path);
	        		if(preg_match("/^tool\/store.*/", $path)){
	        			//var_dump($path);
		    			return redirect('/tool');
		    			exit;
	        		}
        			if(preg_match("/^tool\/image.*/", $path)){
	        			//var_dump($path);
		    			return redirect('/tool');
		    			exit;
        			}
        		}
	        	//var_dump($this->auth->user()->role);
        		$stores = Store::orderBy('id')->pluck('storename','id');
                //var_dump($stores);
        		$user_store = @$stores[$this->auth->user()->store_id];

                $all_storeId = @array_search('全施設', $stores->toArray());
                $stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');
                $all_store_logo = @$stores_imgd[$all_storeId];
                $all_store_logo = json_decode($all_store_logo, true);
                $all_store_logo = $all_storeId . "/" . @$all_store_logo[0]['filename'];

        		\View::share('user_store', $user_store);
                \View::share('all_store_logo', $all_store_logo);
        	}
        	//店舗権限の場合
        	else{
        		//フロントTOPにリダイレクトします。
        		echo "権限エラー";
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
