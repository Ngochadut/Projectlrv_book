<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartManagerController extends Controller
{
    public function index(){
        return view('admin.cartManager.index');
    }
}
