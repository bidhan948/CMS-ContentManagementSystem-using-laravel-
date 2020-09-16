<?php

namespace App\Http\Middleware;

use Closure;

class adminAuth
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
        if(!$request->session()->has('BLOG_USER_ID')){
            $request->session()->flash('msg','Acess denied');
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
