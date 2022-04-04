<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('app');
});

/*
|--------------------------------------------------------------------------
| Admin Page Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AWS ELB Health Check Route 
|--------------------------------------------------------------------------
*/
Route::get('/health-check', function() {
    config()->set('session.driver', 'array');

    return response('I am health', 200)
        ->header('Content-Type', 'text/plain');
});
