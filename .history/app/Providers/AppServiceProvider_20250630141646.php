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

            $type = isset($parts[0]) ? trim($parts[0], " '\"") : 'fade-up';
            $delay = isset($parts[1]) ? trim($parts[1]) : 200;

            return "<?php
                \$ua = request()->header('User-Agent');
                \$delayFinal = (preg_match('/Mobile|Android|iPhone/', \$ua)) ? 200 : {$delay};
                echo 'data-aos=\"{$type}\" data-aos-delay=\"' . \$delayFinal . '\"';
            ?>";
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
