<?php

namespace App\Http\Controllers\admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Parent_category;
use App\Users;

class TypeController extends Controller
{
    public function index(){
        $type = Parent_category::orderByDesc('id')->take(10)->get();
        return view('admin.type.viewType',[
            'types' => $type
        ]);
    }

    public function create(){
    	return view('admin.type.createType');
    }

    public function store(TypeRequest $request)
    {
        $data = $request->except('_token');
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
        if($type = Parent_category::create($data)){
            return redirect()->route('create_type')->with(['class' => 'success', 'message' => 'Create new success !!.']);
    	}
        return redirect()->route('create_type')->with(['class' => 'error', 'message' => 'Wrong !!']);
    }

    public function edit($id){
        if($type = Parent_category::find($id)){
            return view('admin.type.edittype', compact('type'));
        }
        return redirect()->route('create_type');
    }

    public function updateType(TypeRequest $request){
        
        $data = $request->except('_token', 'email');
        if($user = Parent_category::find($request->id)){
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
                return redirect()->back()->with(['class' => 'success', 'message' => 'Update successfully !!']);
            }else{
                return redirect()->back()->with(['class' => 'error', 'message' => 'Update error !!']);
            }}
        
        
    }

    
    public function detail($id){
        if($type = Parent_category::find($id)){
            return view('admin.type.detailType',compact('type'));
        }
        return redirect()->route('viewType');
    }

    public function destroy($id){
        if($type = Parent_category::find($id)){
            if($type->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }
    public function search(Request $request){
        $search = $request->get('search');
        $type = Parent_category::where('name', 'like', '%'. $search. '%')->paginate(3);
        return view('admin.type.viewType', ['types'=> $type]); 
       
    }
}
