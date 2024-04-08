<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/connections', [ExampleController::class, "connections"]);
Route::get('/dashboard', [ExampleController::class, "dashboard"]);
Route::get('/ppp', [ExampleController::class, "ppp"]);
Route::get('/profile1', [ExampleController::class, "profile1"]);
Route::get('/profile2', [ExampleController::class, "profile2"]);
Route::get('/requests', [ExampleController::class, "requests"]);
Route::get('/signup', [ExampleController::class, "signup"]);
Route::get('/step1', [ExampleController::class, "step1"])->name('step1');
Route::get('/step2', [ExampleController::class, "step2"]);
Route::get('/step3', [ExampleController::class, "step3"]);
Route::get('/step4', [ExampleController::class, "step4"]);
Route::get('/userProfile', [ExampleController::class, "userProfile"]);

Route::get('profile2', [PreferencesController::class, 'displayProfile2'])->name('profile2');


// Route::post('/register', [UserController::class,"register"]);
Route::get('/signup', [UserController::class, 'showPage1'])->name('signup');
Route::post('/signup', [UserController::class, 'handlePage1']);
Route::get('/sign2', [UserController::class, 'showPage2'])->name('sign2');
Route::post('/sign2', [UserController::class, 'register']);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('step1', [PreferencesController::class, 'storeStep1'])->name('step1');
Route::get('step2', [PreferencesController::class, 'showStep2'])->name('step2');

Route::post('step2', [PreferencesController::class, 'storeStep2'])->name('step2');
Route::get('step3', [PreferencesController::class, 'showStep3'])->name('step3');

Route::post('step3', [PreferencesController::class, 'storeStep3'])->name('step3');
Route::get('step4', [PreferencesController::class, 'showStep4'])->name('step4');

Route::post('step4', [PreferencesController::class, 'storeStep4'])->name('step4');
Route::get('dashboard', [PreferencesController::class, 'goToDashboard'])->name('dashboard');
Route::get('dashboard', [PreferencesController::class, 'goToDashboard'])->name('dashboard');

Route::post('/updateUserData', 'UserController@updateUserData')->name('updateUserData');

Route::post('/updateUserData', 'UserController@updateUserData')->name('updateUserData');

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
