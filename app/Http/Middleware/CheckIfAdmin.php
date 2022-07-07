<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckIfAdmin
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
        if (!Session::has('adm')) {
            /*
            echo "<pre>";
            print_r($request->session()->all());
            echo "</pre>"; die;
            */
            return redirect('/login');
        }
//$request->session()->flush();
        return $next($request);
    }
}
