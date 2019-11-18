<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserByAdminRequest;
use App\Http\Requests\UserRequest;
use App\Users;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class UserController extends Controller
{
    public function index(){
        $users = Users::orderByDesc('updated_at')->paginate(15);
        return view('admin.index', compact('users'));

    }

    public function create(){
    	return view('admin.users.createUser');
    }

    public function store(UserRequest $request)
    {
        //dd($request);
        $data = $request->except('_token');
        //$data = $request->only('password','roles');
    	$data['password'] = bcrypt($data['password']);
    	if($user = Users::create($data)){
    		return redirect()->route('admin',$user->id);
    	}
        return abort(404);
    }
    

    public function edit($id){
        if($user = Users::find($id)){
            return view('admin.users.edit', compact('user'));
        }
        return redirect()->route('User.List');
    }

    public function updateUser(EditUserByAdminRequest $request){
        // dd($request);
        $data = $request->except('_token', 'email');
        if($user = Users::find($request->id)){
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : $user->password;
            if($request->hasFile('img')) {
                $file = request()->file('img');
                $filename = '/images/avatars/'.md5(time()).'.jpg';
                $file->move(public_path('/images/avatars/'), $filename);
                $data['image'] = $filename;
                if(File::exists(public_path().$user->image)) {
                    File::delete(public_path().$user->image);
                }
            }
            if ($user->update($data)) {
                return redirect()->back()->with(['class' => 'success', 'message' => 'Update successful !!']);
            }else{
                return abort(404);
            }
        
        
        }
    }

    public function destroy($id){
        if($user = Users::find($id)){
            if($user->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }

    public function detail($id){
        if($user = Users::find($id)){
            return view('admin.users.detailUser',compact('user'));
        }
        return redirect()->route('admin');
    }
}
