<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckAdmin
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
        $role_admin_id = DB::table('roles')->where('name','admin')->first()->id; //lấy id của role admin
        $user_role = DB::table('user_role')->where('user_id',Auth::user()->id)->first()->role_id;
        if(Auth::user() && $role_admin_id == $user_role){ //check xem co phai admin khong
            return $next($request); 
        }
        return redirect()->route('welcome'); //dieu huong 
    }
}
