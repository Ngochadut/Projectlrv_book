<?php

namespace App\Http\Controllers;
use App\Books;

use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function showBookDetailByID($id)
    {
        $book = Books::find($id);
		if($book == null) abort(404);
        
        return view('bookDetail',[
            'book' => $book
        ]);
    }
}
