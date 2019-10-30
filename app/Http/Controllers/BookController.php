<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function showBookDetailByID($id)
    {
        $book = Product::find($id);
		if($book == null) abort(404);
        
        return view('bookDetail',[
            'book' => $book
        ]);
    }
}
