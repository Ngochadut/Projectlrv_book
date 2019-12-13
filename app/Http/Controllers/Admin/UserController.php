<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserByAdminRequest;
use App\Http\Requests\UserRequest;
use App\Orders;
use App\Users;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function index(){
        $orders = Orders::all();
        $users = Users::orderByDesc('updated_at')->paginate(15);
        return view('admin.index', compact('users','orders')); 
    }

    public function create(){
      
        return view('admin.users.createUser');
    }

    public function store(EditUserByAdminRequest $request)  
    {
        $data = $request->except('_token');
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
        if($user = Users::create($data)){
            return redirect()->route('create_user')->with(['class' => 'success', 'message' => 'Create new success !!.']);
    	}
        return redirect()->route('create_user')->with(['class' => 'error', 'message' => 'Wrong !!']);
    }

    public function edit($id){
        if($users = Users::find($id)){
            return view('admin.users.editUser', compact('users'));
        }
        return redirect()->route('create_user');
    }

    public function updateUser(EditUserByAdminRequest $request){
        
        $data = $request->except('_token', 'email');
        if($user = Users::find($request->id)){
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : $user->password;
            if ($user->update($data)) {
                return redirect()->back()->with(['class' => 'success', 'message' => 'Update successfully !!']);
            }else{
                return redirect()->back()->with(['class' => 'error', 'message' => 'Update error !!']);
            }}
        
        
    }
    
    public function detail($id){
        if($user = Users::find($id)){
            return view('admin.users.detailUser',compact('user'));
        }
        return redirect()->route('viewUser');
    }

    public function destroy($id){
        if($user = Users::find($id)){
            if($user->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }

    // public function search(Request $request){
    //     $search = $request->get('search');
    //     $user = Users::where('name', 'like', '%'. $search. '%')->paginate(3);
    //     return view('admin.index', ['users'=> $user]); 
       
    // }
    public function search(Request $request){
        $search = $request->get('search');
        $users = Users::where('name', 'like', '%'. $search. '%')->orWhere('email', 'like', "%$search%")->orWhere('phone', 'like', "%$search%")->paginate(15);
        return view('admin.index', compact('users'));
    }
}
