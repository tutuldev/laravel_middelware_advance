<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class ValidUser //name change here

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  ...$roles): Response
    {
        $user = Auth::user();

        echo "<h3 class='text-primary'>We are now in ValidUser Middleware.</h3>";
        echo "<h3 class='text-primary'>".$user->role."</h3>";
        // echo "<h3 class='text-primary'>".$role."</h3>";

        // for singel
        // if(Auth::check() && Auth::user()->role == $role){
        //     return $next($request);

        // }else{
        //     return redirect()->route('login');
        // }

    //   for multiple role
    //     if ($user && in_array($user->role, $roles)) {

    //         return $next($request); // Allow request to proceed
    //     }
    //     // return redirect()->route('login');
    //     return redirect()->route('login')->with('error', 'Access Denied');
    // }

    // for laravel own middleware for 11 not 10

    // if esleif
    // if (Auth:: user()->role == $role) {
    //     return $next($request);
    //     }elseif (Auth:: user()->role == "reader") {
    //     return redirect()->route('user');
    //     }else{
    //     return redirect()->route('login');
    //     }
    
    if (in_array($user->role, $roles)) {

        return $next($request); // Allow request to proceed
    }
    // return redirect()->route('login');
    return redirect()->route('login')->with('error', 'Access Denied');
}


// after complete the request then its run
    // public function terminate(Request $request, Response $response): Void
    // {
    //     echo "<h3 class='text-danger'>We are now in terminateing ValidUser Middleware.</h3>";

    // }
}
