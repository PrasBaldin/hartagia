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
        $path = $request->path();

        // Abaikan request ke asset, favicon, atau API
        if (
            $request->is('favicon.ico') ||
            $request->is('css/*') ||
            $request->is('js/*') ||
            $request->is('images/*') ||
            $request->ajax()
        ) {
            return $next($request);
        }

        // Cek apakah sudah dicatat dalam 1 menit terakhir (opsional)
        $recent = \DB::table('visitors')
            ->where('ip_address', $request->ip())
            ->where('url', $request->fullUrl())
            ->where('visited_at', '>=', \Carbon\Carbon::now()->subMinutes(1))
            ->exists();

        if (!$recent) {
            \DB::table('visitors')->insert([
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'url' => $request->fullUrl(),
                'country' => 'Unknown', // atau isi dari API
                'city' => 'Unknown',
                'visited_at' => \Carbon\Carbon::now(),
            ]);
        }

        return $next($request);
    }
}
