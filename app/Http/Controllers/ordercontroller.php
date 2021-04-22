<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderSuccessMailable;
use Cart;
use App\Order;
use App\Orderproduct;
use App\Product;
use App\Success_order;
use Haruncpi\LaravelIdGenerator\IdGenerator;
// CART

class ordercontroller extends Controller
{
    private  $i = 0;
    public function index(){
        if (!Cart::isEmpty()){
            return view('order.input');    
        }else{
            return redirect('/')->with('status', 'Su carrito de compra esta vacio');
        }
    	
    }
    public function submit(Request $request){
        if (Cart::isEmpty()){
           return redirect('/');
        }


        $request->validate([
            'name' => 'required|alpha|min:3|max:20',
            'LastName' => 'required|alpha|min:3|max:20',
            'cedula' => 'required|numeric',
            'phone' => 'required|numeric',
            'estado' => 'required|alpha',
            'city' => 'required|alpha',
            'email' => 'required|email',
            'delivery' => 'required|string',
            'payment' => 'required|string',    
        ]);
        $order = Order::create([
            'id' => IdGenerator::generate(['table' => 'orders','length' => 10, 'prefix' => date('ds')]),
            'Name' => $request->name,
            'Lastname' => $request->LastName,
            'Cedula' => $request->cedula,
            'Estado' => $request->estado,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'delivery' => $request->delivery,
            'payment' => $request->payment,
        ]);



        $items = Cart::getContent();
        $prdu = [];
        foreach ($items as $item ){
            Orderproduct::create([
                'id_order' => $order->id,
                'id_product' => $item->id,
                'quantity' => $item->quantity,
            ]);
            array_push($prdu, $item);
        }
        
        $mail = [
            'id_order' => $order->id,
            'name' => $request->name,
            'delivery' => $request->delivery,
            'payment' => $request->payment,
            'date' => $order->created_at,
            'products' => (array)$prdu,
        ];

        
        // return $mail;

        // return view('mail.order-success',[
        //     'msg' => $mail,
        // ]);
        Cart::clear();
        Mail::to('cesaragrinzones@gmail.com')->send(new OrderSuccessMailable($mail));
        $ip = request()->ip(); 
        $acceso = DB::table('servers_ip')->where('ip',$ip)->update([
            'form' => true,
        ]);
    	return redirect('/')->with('status', '!! Su Pedido se ha procesado correctamente. Por favor revise su email para mas detalles !!');
    }
    // ADMIN
    public function show($id){
        if (Auth::check()){
            $products = Product::select('tittle','pic','orderproducts.quantity','price')->join('orderproducts','orderproducts.id_product','products.id')->where('orderproducts.id_order',$id)->get();

            return view('order',[
                'order' => Order::find($id),
                'products' => $products,
            ]);   
        }else{
            return redirect('index');
        }
    }
    // admin
    public function success($id){
        if (Auth::check()) {
            $order = Order::find($id);

            // Pasar a succes product
            Success_order::create([
                'id' => $order->id,
                'Name'=> $order->Name,
                'Lastname'=>$order->Lastname,
                'Cedula'=>$order->Cedula,
                'Estado'=>$order->Estado,
                'city'=>$order->city,
                'phone'=>$order->phone,
                'email'=>$order->email,
                'delivery'=>$order->delivery,
                'payment'=>$order->payment,
            ]);
            
            // Restar cantidad de productos
            $productOrders = Orderproduct::select('id_product','quantity')->where('id_order',$order->id)->get();
            foreach ($productOrders as $productOrder) {
                $rel = Product::find($productOrder->id_product);
                $aux = $rel->quantity;
                $rel->update(['quantity' => ($aux - $productOrder->quantity) < 0 ? 0 : $aux - $productOrder->quantity ]);
            }
            $order->delete();

            $ip = request()->ip(); 
            $acceso = DB::table('servers_ip')->where('ip',$ip)->update([
                'form' => false,
            ]);
            return redirect('/ROnYHcir8Vdq64zudoAp6IXfZ');  
        }
    }
    // admin
    public function failed($id){
        if (Auth::check()) {
           $order = Order::find($id);
           Orderproduct::where('id_order',$order->id)->delete();
           $order->delete();

            $ip = request()->ip(); 
            $acceso = DB::table('servers_ip')->where('ip',$ip)->update([
                'form' => false,
            ]);
           return redirect('/ROnYHcir8Vdq64zudoAp6IXfZ'); 
        }
    }





    public function check(Request $request){
        // return $request;
        $order = Order::find($request->id);
        // return $order;
        if (!is_null($order)) {
            if ($order->email != $request->email) {
                return back()->with('status','Pedido no encontrado');
            }


            $products = Product::select('id','tittle','pic','orderproducts.quantity','price')->join('orderproducts','orderproducts.id_product','products.id')->where('orderproducts.id_order',$request->id)->get();

            return view('order.check',[
                'order' => $order,
                'products' => $products,
            ]);
        }else{
            return back()->with('status','Pedido no encontrado');
        }          
    }
    public function checksub(Request $request){
        // cart
        $arrayProduct = $request->is_ok;
        if (!is_null($arrayProduct)) {
            $products = Product::whereIn('id',$arrayProduct)->get();
           if (Cart::isEmpty()) {
                foreach ($products as $product) {
                   
                    Cart::add(
                        $product->id,
                        $product->tittle,
                        $product->price,
                        $request->is_q[$this->i],
                    );
                    $this->i++;
                }
            }else{
                Cart::clear();
                foreach ($products as $product) {
                   
                    Cart::add(
                        $product->id,
                        $product->tittle,
                        $product->price,
                        $request->is_q[$this->i],
                    );
                    $this->i++;
                }
            }
        }else{
            if (!Cart::isEmpty()) {
                Cart::clear(); 
            }
           
        }
        // end cart
        $order = Order::find($request->id);
        Orderproduct::where('order_id',$order->id)->delete();
        $order->delete();
        $ip = request()->ip(); 
        $acceso = DB::table('servers_ip')->where('ip',$ip)->update([
            'form' => false,
        ]);

    
        return redirect('/');
    }


    public function contact(Request $request){
        // return $request;
        $request->validate([
            'name' => 'required|alpha|min:3|max:20',
            'email' => 'required|email',
            'subject' =>'required|string|max:30',
            'msg' => 'required|string|max:255|min:10',
        ]);
        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        ]);
        return back()->with('status','Listo! Pronto contactaremos con usted.');
    }





}
