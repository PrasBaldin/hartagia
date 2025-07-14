<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\SiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $contact = SiteSetting::first();
            $view->with('contact', $contact);
        });

        Blade::directive('aos', function ($expression) {
            $cleanExpr = trim($expression, '() ');
            $parts = explode(',', $cleanExpr);

            $type   = isset($parts[0]) ? str_replace('_', '-', trim($parts[0], " '\"")) : 'fade-up';
            $delay  = isset($parts[1]) ? trim($parts[1]) : 200;
            $anchor = isset($parts[2]) ? trim($parts[2], " '\"") : null;
            $offset = isset($parts[3]) ? trim($parts[3]) : null;

            return '<?php
    $ua = request()->header("User-Agent");
    $delayFinal = (preg_match("/Mobile|Android|iPhone/", $ua)) ? 200 : ' . $delay . ';
    $anchorAttr = ' . ($anchor !== null ? '" data-aos-anchor=\\"' . $anchor . '\\""' : '""') . ';
    $offsetAttr = ' . ($offset !== null ? '" data-aos-offset=\\"' . $offset . '\\""' : '""') . ';
    printf("data-aos=\\"%s\\" data-aos-delay=\\"%d\\"%s%s", "' . $type . '", $delayFinal, $anchorAttr, $offsetAttr);
?>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
