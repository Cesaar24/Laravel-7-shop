<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SearchController extends Controller
{
    public function index(Request $s){
    	// return $s;
    	return view('search',[
    		'products' => Product::where('tittle',$s->search )->get(),
    	]);

    }
}
