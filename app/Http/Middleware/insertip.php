<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
class insertip
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

        if( !DB::table('servers_ip')->where('ip',$_SERVER['REMOTE_ADDR'])->first() ){
            DB::table('servers_ip')->insert([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'block' => false,
                'form' => false,
            ]);
        }
        return $next($request);
    }
}
