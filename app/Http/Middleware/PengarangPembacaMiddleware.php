<?php

namespace App\Http\Middleware;

use Closure;

class PengarangPembacaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->userRole == 'pengarang' || $request->user()->userRole == 'pembaca') {
            return $next($request);
        }

        session()->flash('message', 'You dont have permission!');

        return back();
    }
}
