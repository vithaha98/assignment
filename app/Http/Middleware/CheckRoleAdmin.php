<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckRoleAdmin
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
        if(Auth::user()->is_admin !== config('common.role.admin')){
            abort(403);
        }
        return $next($request);
    }
}
