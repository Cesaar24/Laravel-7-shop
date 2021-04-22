<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use App\Order;

use App\Categorie;
class admincontroller extends Controller
{

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

	public function index(){
		if (Auth::check()) {

			$ParentsCategory = Categorie::where('category_id',null)->get();
			//añade otro atributo child[] a cada categoria padre
			$ParentsCategory->map(function ($item) {
				$item->children = $this->Childs($item->id);
			});

			// return $ParentsCategory;

			$orders = Order::paginate(10);
			// return $orders;

			return view('admin',[
				'orders' => $orders,
				'ParentsCategory' => $ParentsCategory,
				'contacts' =>  DB::table('contacts')->get(),
			]);

		}else{
			return redirect()->route('index');
		}

    
    }
    public function addCategory(Request $request){
		if (Auth::check()) {
			$file = $request->file('pic');
			Categorie::create([
				'category_id' => ($request->categorie != 'null') ?  $request->categorie : null  ,
				'Name' => Str::slug($request->name,'-'),
				'pic' => ($request->categorie == 'null') ? Storage::disk('public')->put('categoria',$file) : null,
			]);
		}else{
			return redirect()->route('index');
		}


    	return back();

    }

	private function ChildsRemove($id){
        $query = Categorie::where('category_id',$id)->get();
        if (count($query) > 0) {
            $query->map(function ($item) {
            	$this->ChildsRemove($item->id);
            	$item->delete();
        	});

        	
        }else{

            
        }

    }

    public function removeCategory(Request $request){
		// return $request->categorie;	
		
		$Parent = Categorie::find($request->categorie);
		$ParentsCategory = Categorie::where('category_id',$request->categorie)->get();

		if (count($ParentsCategory) > 0) {
			$ParentsCategory->map(function ($item){
            	$item->children = $this->Childs($item->id);
        	});
        	$ParentsCategory->map(function ($item) {
	            $this->ChildsRemove($item->id);
            	$item->delete();
        	}); 
		}   
        $Parent->delete();	
    	return back();
    }
}
