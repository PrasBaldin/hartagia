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
Route::get('/admin', function () {
    return view('admin.dashboard');
});
