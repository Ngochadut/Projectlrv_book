<?php

namespace App\Http\Controllers\Auth;



use App\Users;
use App\Http\Controllers\Controller;
use App\Roles;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
   

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome'; 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Users
     */
    protected function create(array $data)
    {
        // return Users::create([
        //     'name' =>  $data['name'] ,
        //     'email' =>  $data['email'],
        //     'password' => bcrypt($data['password']), 
        // ]);
        
        $user_id = DB::table('users')->insertGetId([
            'name' =>  $data['name'] ,
            'email' =>  $data['email'],
            'password' => bcrypt($data['password']), 
        ]);
        // dd($user_id);
        // dd($data);
        $user_role = DB::table('roles')->where('name','user')->first(); //lấy id của role user
        DB::table('user_role')->insert(['user_id' => $user_id,'role_id' => $user_role->id]); //
			
        return Users::find($user_id);
    } 

    public function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
}
