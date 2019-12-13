<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class UserController extends Controller
{
    public function account(){
		return view('user.account');
	}
 
	public function edit(){
        return view('user.editAccount'); 
       
    }

    public function updateUser(Request $request){
    
		if($request->password === null){
			$data = $request->only('name', 'phone', 'firstname', 'lastname', 'address');
		}
		else{
			$data = $request->only('phone', 'firstname', 'lastname', 'address', 'password');
			$data['password'] = bcrypt($data['password']);
		}
		$user = Users::where('email',$request->email);
		if ($user->update($data)) {
			return view('user.account');
		}else{
			return redirect()->back()->with(['class' => 'danger', 'message' => 'Error Database.']);
		}
        
    }
    
}