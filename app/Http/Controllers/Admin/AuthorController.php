<?php

namespace App\Http\Controllers\admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::orderByDesc('updated_at')->paginate(15);
        return view('admin.author.viewAuthor', compact('authors'));
    }

    public function create(){
    	return view('admin.author.createAuthor');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
        if($author = Author::create($data)){
            return redirect()->route('create_author')->with(['class' => 'success', 'message' => 'Create new success !!.']);
    	}
        return redirect()->route('create_author')->with(['class' => 'error', 'message' => 'Wrong !!']);
    }

    public function edit($id){
        if($author = Author::find($id)){
            return view('admin.author.editauthor', compact('author'));
        }
        return redirect()->route('create_author');
    }

    public function updateAuthor(AuthorRequest $request){
        
        $data = $request->except('_token', 'email');
        if($user = Author::find($request->id)){
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
        if($author = Author::find($id)){
            return view('admin.author.detailAuthor',compact('author'));
        }
        return redirect()->route('viewAuthor');
    }

    public function destroy($id){
        if($type = Author::find($id)){
            if($type->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }
}
