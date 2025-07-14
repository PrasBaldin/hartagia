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

Route::get('/', function () {
    return redirect('/id');
});

Route::group([
    'prefix' => '{lang}',
    'middleware' => 'setlocale',
    'where' => ['lang' => 'en|id']
], function () {
    Route::get('/', function () {
        return view('pages.home');
    });

    Route::get('/about', function () {
        return view('pages.about');
    });

    Route::get('/services', function () {
        return view('pages.services');
    });

    Route::get('/portfolio', function () {
        return view('pages.portfolio');
    });

    Route::get('/contact', function () {
        return view('pages.contact');
    });
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    // Admin dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/portfolio', 'PortfolioController@index')->name('admin.portfolio');
    // create portfolio
    Route::get('/portfolio/create', 'PortfolioController@create')->name('admin.portfolio.create');
    Route::post('/portfolio/store', 'PortfolioController@store')->name('admin.portfolio.store');
    // edit portfolio
    Route::get('/portfolio/edit/{id}', 'PortfolioController@edit')->name('admin.portfolio.edit');
    Route::post('/portfolio/update/{id}', 'PortfolioController@update')->name('admin.portfolio.update');
    // delete portfolio
    Route::delete('/portfolio/delete/{id}', 'PortfolioController@delete')->name('admin.portfolio.delete');

    Route::get('/services', 'ServiceController@index')->name('admin.services');
    // create services
    Route::get('/service/create', 'ServiceController@create')->name('admin.service.create');
    Route::post('/service/store', 'ServiceController@store')->name('admin.service.store');
    // edit services
    Route::get('/service/edit/{id}', 'ServiceController@edit')->name('admin.service.edit');
    Route::post('/service/update/{id}', 'ServiceController@update')->name('admin.service.update');
    // delete services
    Route::delete('/service/delete/{id}', 'ServiceController@delete')->name('admin.service.delete');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

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
