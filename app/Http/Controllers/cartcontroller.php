<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class cartcontroller extends Controller
{
    public function add(Request $request){
    	$product = Product::findOrFail($request->id);
        if ($request->quantity > $product->quantity) {
            return back()->with('warning','Error producto agotado');
        }
    	Cart::add(
    		$product->id,
    		$product->tittle,
    		$product->price,
    		$request->quantity,
            $product->pic,
    	);
    	return back()->with('status', 'Producto agregado exitosamente');
    }

    public function addi($id){
        
        $product = Product::findOrFail($id);
        if (1  > $product->quantity) {
            return back()->with('warning','Error producto agotado');
        }
        Cart::add(
            $product->id,
            $product->tittle,
            $product->price,
            1,
            $product->pic,
        );
        return back()->with('status', 'Producto agregado exitosamente');
    }




    public function remove($id){
        if (Auth::check()) {
            Cart::remove($id);
        }
        return back();
    }


	public function show(){
		
		return view('cart');
	}
}
