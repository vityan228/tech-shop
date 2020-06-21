<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->isAdmin()){
            session()->flash('warning','ne tyda chuvak!');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
