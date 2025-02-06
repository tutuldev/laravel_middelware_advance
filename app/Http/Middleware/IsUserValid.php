<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class IsUserValid //name change here 

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "<h3 class='text-primary'>We are now in ValidUser Middleware.</h3>";
        if(Auth::check()){
            return $next($request);

        }else{
            return redirect()->route('login');
        }
    }
// after complete the request then its run
    public function terminate(Request $request, Response $response): Void
    {
        echo "<h3 class='text-danger'>We are now in terminateing ValidUser Middleware.</h3>";

    }
}
