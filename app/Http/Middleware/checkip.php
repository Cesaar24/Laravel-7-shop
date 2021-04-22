<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;



class checkip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $ip = request()->ip(); 
        $acceso = DB::table('servers_ip')->where('ip',$ip)->first();
        if($acceso->form){
            return redirect('/')->with('warning','Su pedido ya esta en proceso.');
        }
        //caso contrario seguimos con petición
        return $next($request);
  

    }
}
