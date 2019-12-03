<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * 
     * @var string
     */
    protected $redirectTo = '/welcome'; //login xong chuyển đến home

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(\Illuminate\Http\Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        
        $role_admin_id = DB::table('roles')->where('name','admin')->first()->id; //lấy id của role admin
        $user_role = DB::table('user_role')->where('user_id',$this->guard()->user()->id)->first()->role_id;
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended(($role_admin_id == $user_role) ? 'admin' : $this->redirectPath());
    }
}
