<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;

class productcontroller extends Controller
{


    private $arrayCategorie = [];
    private function getArrayCategorie($id)
    {

        $data = Categorie::where('id',$id)->first();
        array_push($this->arrayCategorie,$data['Name']);

        if ($data['category_id'] == null) {
            return $this->arrayCategorie;
        }else{
            return $this->getArrayCategorie($data['category_id']);
        }
    }




    public function index(){



    	$products= Product::take(6)->get(); 

    	return view("welcome",[
    		'products'=> $products,
            // 'ip' => $_SERVER['REMOTE_ADDR'],
            // 'id' => IdGenerator::generate(['table' => 'products','length' => 10, 'prefix' => date('ds')]),
            'parents' => Categorie::where('category_id',null)->get(),
    	]);
    	// return $products;
    }

     public function show($name){
        $namenotspace = str_replace('-', ' ', $name);
        // return $namenotspace;
        $id_category = Product::select('categorie')->where('tittle',$namenotspace)->firstOrFail()->categorie;
       
        $category =  Categorie::where('id',$id_category)->firstOrFail();
        

        // return Product::where('categorie',$id_category)->get();
        if ($category->category_id != null) {
            $c = $this->getArrayCategorie($category->id);
            return view("product",[
               'product'=> Product::where('tittle',$namenotspace)->first(),
               'relateds' => Product::where('categorie',$id_category)->where('tittle','<>',$namenotspace)->take(3)->get(),
               'categorys' => $c,
            ]);
        }else{

            return view("product",[
                'product'=> Product::where('tittle',$namenotspace)->first(),
                'relateds' => Product::where('categorie',$id_category)->where('tittle','<>',$namenotspace)->take(3)->get(),
                'category' => $category->Name,
            ]);
        }

    
    }
    // admin
    public function add(Request $request){
        // return $request;
       
        // return $file;
        if (Auth::check()){
            $file = $request->file('pic');
            Product::Create([
                'id' => IdGenerator::generate(['table' => 'products','length' => 10, 'prefix' => date('ds')]),
                'tittle' => $request->tittle,
                'description' => $request->descripcion,
                'pic' => Storage::disk('public')->put('product',$file),
                'price' => $request->price,
                'categorie' => $request->category,
                'quantity' => $request->quantity,
            ]);

            // return $request;
            return back();
        }else{
            return redirect('/');
        }
        
    }
    // admin
    public function remove($id){
        // return $request;
        if (Auth::check()){
            $product = Product::find($id);
            $product->delete();
            // return $request;
            return back();  
        }else{
            return redirect('/');
        }
    }
}





