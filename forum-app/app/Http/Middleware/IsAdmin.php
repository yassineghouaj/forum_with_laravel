<?php

namespace App\Http\Middleware;


use App\Models\User;
use App\Policies\UserPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class isAdmin{
     
    public function handle(Request $request, Closure $next, $guard = null){
        
       if(Auth::guard($guard)->user()->can(UserPolicy::ADMIN, User::class))
       return $next($request);

  }

}