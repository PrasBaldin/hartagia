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

        // Abaikan request ke asset, favicon, atau AJAX
        if (
            $request->is('favicon.ico') ||
            $request->is('css/*') ||
            $request->is('js/*') ||
            $request->is('images/*') ||
            $request->ajax()
            $request->path() === '/'
        ) {
            return $next($request);
        }

        // Gunakan IP publik jika localhost
        $ip_address = in_array($request->ip(), ['127.0.0.1', '::1']) ? '110.138.93.53' : $request->ip();

        // Cek apakah sudah dicatat dalam 1 menit terakhir
        $recent = \DB::table('visitors')
            ->where('ip_address', $ip_address)
            ->where('url', $request->fullUrl())
            ->where('visited_at', '>=', \Carbon\Carbon::now()->subMinutes(1))
            ->exists();

        if (!$recent) {
            // Ambil data lokasi dari ip-api.com
            $response = @file_get_contents("http://ip-api.com/json/{$ip_address}?fields=status,country,city");
            $geo = json_decode($response);

            $country = ($geo && $geo->status === 'success') ? $geo->country : 'Unknown';
            $city = ($geo && $geo->status === 'success') ? $geo->city : 'Unknown';

            \DB::table('visitors')->insert([
                'ip_address' => $ip_address,
                'user_agent' => $request->header('User-Agent'),
                'url' => $request->fullUrl(),
                'country' => $country,
                'city' => $city,
                'visited_at' => \Carbon\Carbon::now(),
            ]);
        }

        return $next($request);
    }
}
