<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Parent_category;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Categories::orderByDesc('updated_at')->paginate(15);
        return view('admin.category.viewCategory', compact('categorys'));
    }
    public function create(){
        $types = Parent_category::all();
    	return view('admin.category.createCategory',compact('types'));
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
        if($category = Categories::create($data)){
            return redirect()->route('create_category')->with(['class' => 'success', 'message' => 'Create new success !!.']);
    	}
        return redirect()->route('create_category')->with(['class' => 'error', 'message' => 'Wrong !!']);
    }

    public function edit($id){
        if($category = Categories::find($id)){
            return view('admin.category.editCategory', compact('category'));
        }
        return redirect()->route('create_category');
    }

    public function updateCategory(Request $request){
        $data = $request->except('_token', 'email');
        if($user = Categories::find($request->id)){
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : $user->password;
            if ($user->update($data)) {
                return redirect()->back()->with(['class' => 'success', 'message' => 'Update successfully !!']);
            }else{
                return redirect()->back()->with(['class' => 'error', 'message' => 'Update error !!']);
            }}
        
    }

    
    public function detail($id){ 
        $types = Parent_category::all();
        if($category = Categories::find($id)){
            // dd($category->parent_category->id);
            return view('admin.category.detailCategory',compact(['category', 'types']));
        }
        return redirect()->route('viewCategory',compact('types'));
    }

    public function destroy($id){
        if($type = Categories::find($id)){
            if($type->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }
    
    public function search(Request $request){
        $search = $request->get('search');
        $category = Categories::where('name', 'like', '%'. $search. '%')->paginate(3);
        return view('admin.category.viewCategory', ['categorys'=> $category]); 
       
    }


   
}
