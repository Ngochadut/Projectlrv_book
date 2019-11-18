<?php

namespace App\Http\Controllers\admin;

use App\Author;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderByDesc('updated_at')->paginate(15);
        return view('admin.product.viewProduct', compact('products'));
    }

    public function create(){
        $categorys = Categories::all();
        $authors = Author::all();
    	return view('admin.product.createProduct',compact('authors', 'categorys'));
    }
    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
         
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
        if($product = Product::create($data)){
            return redirect()->route('create_product')->with(['class' => 'success', 'message' => 'Create new success !!.']);
    	}
        return redirect()->route('create_product')->with(['class' => 'error', 'message' => 'Wrong !!']);
    }

    public function edit($id){
        if($product = Product::find($id)){
            return view('admin.product.editProduct', compact('product'));
        }
        return redirect()->route('create_product');
    }

    public function updateProduct(ProductRequest $request){
        $data = $request->except('_token', 'email');
        if($user = Product::find($request->id)){
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
        $authors = Author::all();
        $categorys = Categories::all();
        if($product = Product::find($id)){
            // dd($category->parent_category->id);
            return view('admin.product.detailProduct',compact(['product', 'authors','categorys']));
        }
        return redirect()->route('viewProduct',compact('authors','categorys'));
    }

    public function destroy($id){
        if($product = Product::find($id)){
            if($product->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Deleted successfully !!']);
            }
        }
        return redirect()->back()->with(['class' => 'error', 'message' => 'Delete wrong !!']);
    }



}
