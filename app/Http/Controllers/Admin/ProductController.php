<?php

namespace App\Http\Controllers\admin;

use App\Author;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $product_images = Product::with(['images:product_id,name'])->paginate(15);
        // $product_images = DB::table('product')->join('image')->get();
        
        //  dd($product_images); 
        //  $product_images = Product::with(array('images'=>function($query){
        //      $query->select(DB::raw('name as direct'));
        //  }))->get();
        
        //  dd($product_images);
        return view('admin.product.viewProduct', compact('product_images'));
    }

    public function create(){
        $categorys = Categories::all();
        $authors = Author::all();
    	return view('admin.product.createProduct',compact('authors', 'categorys'));
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = array_merge($data,['update_by' => \Auth::user()->name,'create_by' => \Auth::user()->name]);
         if($product = Product::create($data)){
            if($request->hasFile('imgs')) {
                $imageDatas = [];
                foreach(request()->file('imgs') as $image){
                   $filename = '/images/product/'.md5(time()).'.jpg';
                    $image->move(public_path('/images/product/'), $filename);
                    $imageData = [
                        'product_id' => $product->id,
                        'name' => $filename,
                        'update_by' => \Auth::user()->name,
                        'create_by' => \Auth::user()->name
                    ];
                    array_push($imageDatas,$imageData);
                }
                Image::insert($imageDatas);
            }
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
        if($product = Product::find($request->id)){
            if($request->hasFile('imgs')) {
                $file = request()->file('imgs');
                $filename = '/images/avatars/'.md5(time()).'.jpg';
                $file->move(public_path('/images/avatars/'), $filename);
                $data['image'] = $filename;
            if(File::exists(public_path().$product->image)) {
                File::delete(public_path().$product->image);
            }
        }
        if ($product->update($data)) {
            return redirect()->back()->with(['class' => 'success', 'message' => 'Update successfully !!']);
        }else{
            return redirect()->back()->with(['class' => 'error', 'message' => 'Update error !!']);
            }
        }    
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

    public function search(Request $request){
        $search = $request->get('search');
        $product = Product::with(['images:product_id,name'])->where('name', 'like', '%'. $search. '%')->paginate(3);
        return view('admin.product.viewProduct', ['products'=> $product]); 
       
    }



}
