<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Shop extends Controller
{
    //
    public function index(){
        $login=false;
        return view('Shop.shop',compact('login'));
    }
}
