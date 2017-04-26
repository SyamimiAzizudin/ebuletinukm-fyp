<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Closure;

class RoleMiddleware
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role = null) //var $role ni ambil dari route lepas roleCheck:$role
    {
        $user = $request->user();
        if($user && $user->roleCheck($role)){  //rolecheck refer User.php function
            return $next($request);
        } else {
            // dd('pengarang'); //error page x
            return $next($request);
            // return response()->view('errors.missing', [], 404);           
        }
    }
}
