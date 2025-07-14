<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Service;
use App\Portfolio;

Route::get('/', function () {
    return redirect('/id');
});

Route::group([
    'prefix' => '{lang}',
    'middleware' => 'setlocale',
    'where' => ['lang' => 'en|id']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/services', 'HomeController@services')->name('services');
    Route::get('/services/{slug}', 'HomeController@serviceShow')->name('service.show');
    Route::get('/portfolio', 'HomeController@portfolio')->name('portfolio');
    Route::get('/portfolio/{slug}', 'HomeController@portfolioShow')->name('portfolio.show');
});

// Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    // Admin dashboard
    Route::get('/dashboard', function () {
        $serviceCount = Service::count();
        $portfolioCount = Portfolio::count();

        return view('admin.dashboard', compact('serviceCount', 'portfolioCount'));
    })->name('dashboard');

    Route::resource('service', 'ServiceController');
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('setting', 'SettingController', ['only' => ['index', 'store']]);
    Route::post('/setting/update/contact', 'SettingController@updateContact')->name('setting.update.contact');
    Route::post('/setting/update/password', 'SettingController@updatePassword')->name('setting.update.password');

    // Add more admin routes here
});

// Authentication routes
Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::any('/debug-request', function (Request $request) {
    return response()->json([
        'method' => $request->method(),
        'inputs' => $request->all(),
        '_method' => $request->input('_method'),
    ]);
});
