<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
class CategoriController extends Controller
{

    // Retorna Collection{hijos de nodo $id} null si no tiene
    private function Childs($id){
        $query = Categorie::where('category_id',$id)->get();
        if (count($query) > 0) {

            $query->map(function ($item) {
            $item->children = $this->Childs($item->id);
        });

        return $query;
        }else{

            return null;
        }

    }
    private $arrayCategorie = [];
    private function getArrayCategorie($id){

        $data = Categorie::where('category_id',$id)->get();

        foreach ($data as $key ) {
            array_push($this->arrayCategorie,$key['id']);
        }

        array_push($this->arrayCategorie,$id);
        return $this->arrayCategorie;
        
    }

	//parent
 	public function index(){

 		// return Categorie::where('category_id',null)->get();
 		return view('categorie',[
 			'parents' => Categorie::where('category_id',null)->get(),
 		]);
 	}


 	public function show($tag){
        $id_parent = Categorie::select('id')->where('Name',$tag)->firstOrFail()->id;
        
        // nodos padres
        $ParentsCategory = Categorie::where('category_id',null)->get();
        $ParentsCategory->map(function ($item) {
            $item->children = $this->Childs($item->id);
        });


        
        $arrayc =  $this->getArrayCategorie($id_parent);
        $products = Product::whereIn('categorie',$arrayc)->get();
      

        return view('category.show',[
            'ParentsCategory' => $ParentsCategory,
            'Products' => $products,
            'tag' => $tag,
        ]);
 	}


}
