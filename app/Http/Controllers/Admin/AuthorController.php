<?php

namespace App\Http\Controllers\admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Image_author;

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
                if($request->hasFile('imgs')) {
                    $imageDatas = [];
                    foreach(request()->file('imgs') as $image){
                        $filename = '/images/author/'.md5(time()).'.jpg';
                        $image->move(public_path('/images/author/'), $filename);
                        $imageData = [
                            'author_id' => $author->id,
                            'name' => $filename,
                            'update_by' => \Auth::user()->name,
                            'create_by' => \Auth::user()->name
                        ];
                        array_push($imageDatas,$imageData);
                    }
                    Image_author::insert($imageDatas);
                }
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
        if($author = Author::find($request->id)){
            if($request->hasFile('imgs')) {
                $file = request()->file('imgs');
                $filename = '/images/author/'.md5(time()).'.jpg';
                $file->move(public_path('/images/author/'), $filename);
                $data['image'] = $filename;
            if(File::exists(public_path().$author->image)) {
                File::delete(public_path().$author->image);
            }
        }
        if ($author->update($data)) {
            return redirect()->back()->with(['class' => 'success', 'message' => 'Update successfully !!']);
        }else{
            return redirect()->back()->with(['class' => 'error', 'message' => 'Update error !!']);
            }
        }    
        
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

    public function search(Request $request){
        $search = $request->get('search');
        $author = Author::where('name', 'like', '%'. $search. '%')->paginate(3);
        return view('admin.author.viewAuthor', ['authors'=> $author]); 
       
    }
}
