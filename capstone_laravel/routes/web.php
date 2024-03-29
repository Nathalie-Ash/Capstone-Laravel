<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ ExampleController::class, "welcome"] );
Route::get('/connections', [ExampleController::class, "connections"]);
Route::get('/dashboard', [ExampleController::class, "dashboard"]);
Route::get('/ppp', [ExampleController::class, "ppp"]);
Route::get('/profile1', [ExampleController::class, "profile1"]);
Route::get('/profile2', [ExampleController::class, "profile2"]);
Route::get('/requests', [ExampleController::class, "requests"]);
Route::get('/sign2', [ExampleController::class, "sign2"]);
Route::get('/signup', [ExampleController::class, "signup"]);
Route::get('/step1', [ExampleController::class, "step1"]);
Route::get('/step2', [ExampleController::class, "step2"]);
Route::get('/step3', [ExampleController::class, "step3"]);
Route::get('/step4', [ExampleController::class, "step4"]);
Route::get('/userProfile', [ExampleController::class, "userProfile"]);


Route::post('/storeStep1', [PreferencesController::class, "storeStep1"]);

// Route::post('/step1', function () {
//     return redirect('/step2'); 
// });

// Route::post('/step2', function () {
//     return redirect('/step3'); 
// });

// Route::post('/step3', function () {
//     return redirect('/step4'); 
// });

// Route::post('/step4', function () {
//     return redirect('/dashboard'); 
// });