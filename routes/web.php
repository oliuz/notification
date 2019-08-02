<?php
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

/**
 * Principal
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'TestController')->name('test');

/**
 * Auth
 */

Auth::routes();

Route::resource('message', 'MessageController');
