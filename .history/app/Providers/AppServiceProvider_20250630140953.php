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
            return "<?php
        list(\$type, \$delay) = explode(',', str_replace(['(', ')', ' ', \"'\", '\"'], '', $expression));
        \$delayValue = (request()->header('User-Agent') && preg_match('/Mobile|Android|iPhone/', request()->header('User-Agent'))) ? 200 : trim(\$delay);
        echo 'data-aos=\"' . trim(\$type) . '\" data-aos-delay=\"' . \$delayValue . '\"';
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
