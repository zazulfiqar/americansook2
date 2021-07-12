<?php

namespace App\Http\Middleware;

use Closure;

class Vendor
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//            return $next($request);

        if($request->user()->role=='vendor'){
            return $next($request);
        }

        else{
            request()->session()->flash('error','You Vendor do not have any permission to access this page');
            return redirect()->route($request->user()->role);
        }

//        else{
//            request()->session()->flash('error','You do not have any permission to access this page Its for vendor Only' );
//            return redirect()->route($request->user()->role);
//        }
    }

//        if ($request->user()->role == 'vendor') {
//            return $next($request);
//        }
//        else {
//            return response()->json('Unauthorized', 401);
//        }

//if(empty(session('user'))){
//return redirect()->route('login.form');
//}
//else{
//    return $next($request);
//}
}



