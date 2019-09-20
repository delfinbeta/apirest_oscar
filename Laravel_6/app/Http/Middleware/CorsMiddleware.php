<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
       // header("Access-Control-Allow-Origin: http://localhost:8080");

       // $headers = [
       //  'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
       //  'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
       // ];
       // if($request->getMethod() == "OPTIONS") {

       //  return response()->make('OK', 200, $headers);
       // }

       // $response = $next($request);
       // foreach($headers as $key => $value)
       //  $response->header($key, $value);
       // return $response;

        $allowedOrigins = ['http://localhost:8000', 'http://localhost:8080', 'http://localhost:8001'];
        // $origin = $_SERVER['HTTP_ORIGIN'];
        $origin = 'http://localhost:8000';

        if (in_array($origin, $allowedOrigins)) {
            return $next($request)
                ->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type');
        }

        return $next($request);
    }

}
