<?php

namespace App\Http\Middleware;

use Closure;

class verificarPermisos
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
        $permisos=array_slice(func_get_args(),2);
        if(auth()->user()->isAdmin()){
            return $next($request);
        }
        else if(auth()->user()->hasPermisos($permisos)){
            return $next($request);
        }else{
            return redirect()->route('menu');
        }
    }
}
