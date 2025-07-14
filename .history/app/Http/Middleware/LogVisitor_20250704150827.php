<?php

namespace App\Http\Middleware;

use Closure;

class LogVisitor
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
        $ip = $request->ip();
        $response = @file_get_contents("http://ip-api.com/json/{$ip}");
        $geo = json_decode($response);
        \DB::table('visitors')->insert([
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'url' => $request->fullUrl(),
            'visited_at' => \Carbon\Carbon::now(),
        ]);

        return $next($request);
    }
}
