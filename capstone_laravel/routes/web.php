<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\userContactsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserProfileControllerController;
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
Route::get('/connections', [ExampleController::class, "connections"])->name('connections');
Route::get('/dashboard', [ExampleController::class, "dashboard"]);
Route::get('/ppp', [ExampleController::class, "ppp"]);
Route::get('/profile1', [ExampleController::class, "profile1"]);
Route::get('/profile2', [ExampleController::class, "profile2"]);
Route::get('/requests', [ExampleController::class, "requests"]);
//Route::get('/signup', [ExampleController::class, "signup"]);
Route::get('/step1', [ExampleController::class, "step1"])->name('step1');
Route::get('/step2', [ExampleController::class, "step2"]);
Route::get('/step3', [ExampleController::class, "step3"]);
Route::get('/step4', [ExampleController::class, "step4"]);
Route::get('/userProfile', [ExampleController::class, "userProfile"]);

Route::get('/contact', [ExampleController::class, 'contact'])->name('contact');

Route::get('profile2', [PreferencesController::class, 'displayProfile2'])->name('profile2');
Route::get('profile1', [UserController::class, 'displayProfile1'])->name('profile1');
//Route::get('profile1', [PreferencesController::class, 'displayAvatar'])->name('profile1');


// Route::post('/register', [UserController::class,"register"]);
Route::get('/signup', [RegisterController::class, 'showPage1'])->name('signup');
Route::post('/signup', [RegisterController::class, 'handlePage1']);
//Route::post('/check-username', 'Auth\RegisterController@checkUsernameAvailability');

Route::get('/sign2', [RegisterController::class, 'showPage2'])->name('sign2');
Route::post('/sign2', [RegisterController::class, 'register'])->name('register');

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('step1', [PreferencesController::class, 'showStep1'])->name('steps');
Route::post('step1', [PreferencesController::class, 'storeStep1'])->name('step1');
Route::get('step2', [PreferencesController::class, 'showStep2'])->name('step2');

Route::post('step2', [PreferencesController::class, 'storeStep2'])->name('step2');
Route::get('step3', [PreferencesController::class, 'showStep3'])->name('step3');

Route::post('step3', [PreferencesController::class, 'storeStep3'])->name('step3');
Route::get('step4', [PreferencesController::class, 'showStep4'])->name('step4');

Route::post('step4', [PreferencesController::class, 'storeStep4'])->name('step4');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/saveUserData', [PreferencesController::class, 'saveUserData'])->name('saveUserData');


Route::get('/user/{name}', [UserProfileController::class, 'userProfile'])->name('user.profile');


Route::get('/requests', [ConnectionsController::class, 'pendingConnectionRequests'])->name('requests');
Route::post('/accept-connection', [ConnectionsController::class, 'acceptConnection'])->name('acceptConnection');
Route::get('/connections', [ConnectionsController::class, 'myConnections'])->name('my.connections');
Route::get('/userProfile', [ConnectionsController::class, 'myConnections'])->name('my.connections');



Route::get('/add-profile/{profileId}', [UserProfileController::class, 'addProfile'])->name('add.profile');
Route::get('/dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
Route::post('/store-avatar', [PreferencesController::class, 'storeAvatar'])->name('store.avatar');

Route::post('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('softDeleteUser');
Route::post('/connections',[userContactsController::class,'sendContact'])->name('sendContact');
Route::get('/contact', [userContactsController::class, 'receivedContacts'])->name('received.contacts');
