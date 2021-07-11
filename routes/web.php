<?php

use App\Models\Bloodsample;
use Illuminate\Support\Facades\Route;

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
    $bloodsamples = Bloodsample::get();
    $user = auth()->user();
    return view('welcome', compact('bloodsamples', 'user'));
});

Route::get('/register-hospital', function(){
    return view('registerAsHospital');
});
Route::post('/register-hospital', 'App\Http\Controllers\HospitalController@store');

Route::get('/register-receiver', function(){
    return view('registerAsReceiver');
});
Route::post('/register-receiver', 'App\Http\Controllers\ReceiverController@store');


// authenticated routes
Route::group(['middleware' => ['auth']], function () {

    // to make roles - hospital and receiver
    Route::get('role','App\Http\Controllers\RoleController@index');
    Route::post('role', 'App\Http\Controllers\RoleController@store');


    Route::group(['middleware' => ['role:receiver']], function () {
        Route::get('request-sample', 'App\Http\Controllers\ReceiverController@requestSample');
    });    

    Route::group(['middleware' => ['role:hospital']], function () {
        Route::post('/add-blood-sample', 'App\Http\Controllers\HospitalController@addBloodSample');
        Route::get('add-blood-sample', function(){
            return view('hospital.addBloodSample');
        });
        Route::get('blood-sample-request','App\Http\Controllers\HospitalController@viewRequest' );
    });    


});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
