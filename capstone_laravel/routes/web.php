<?php
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\userContactsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

use App\Http\Controllers\Auth\ResetPasswordController;
 
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/send-verification-email', [VerificationController::class, 'sendVerificationEmail'])->name('send-verification-email');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::find($id);

    if ($user && $user->deleted) {
        $user->markEmailAsVerified();
        $user->deleted = false;
        $user->save();
        event(new Verified($user));
        return redirect('/dashboard');
    }
    return redirect('/step1');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

 
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// web.php


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/adminview/{id}', [AdminController::class, 'indexprofile'])->name('admin.profile');
    Route::put('/edit-bio/{userid}', [AdminController::class, 'updateBio'])->name('edit.bio');
    Route::delete('/adminview/{userid}/delete-avatar', [AdminController::class, 'deleteavatar'])->name('delete.avatar');
    Route::delete('/adminview/{userid}/delete-timetable', [AdminController::class, 'deletetimetable'])->name('delete.timetable');
});

Route::post('/check-username', [RegisterController::class, 'checkUsername'])->name('checkUsername');

Route::get('/signup', [RegisterController::class, 'showPage1'])->name('signup');
Route::post('/signup', [RegisterController::class, 'handlePage1']);


Route::get('/sign2', [RegisterController::class, 'showPage2'])->name('sign2');
Route::post('/sign2', [RegisterController::class, 'register'])->name('register');

// Auth::routes();
// routes/web.php
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('step1', [PreferencesController::class, 'showStep1'])->name('steps');
Route::post('step1', [PreferencesController::class, 'storeStep1'])->name('step1');
Route::get('step2', [PreferencesController::class, 'showStep2'])->name('step2');

Route::post('step2', [PreferencesController::class, 'storeStep2'])->name('step2');
Route::get('step3', [PreferencesController::class, 'showStep3'])->name('step3');

Route::post('step3', [PreferencesController::class, 'storeStep3'])->name('step3');
Route::get('step4', [PreferencesController::class, 'showStep4'])->name('step4');

Route::post('step4', [PreferencesController::class, 'storeStep4'])->name('step4');
//Route::get('/retrieve-account', 'App\Http\Controllers\Auth\RetrieveAccountController@showVerifyEmailForm')->name('retrieve.account');
//Route::get('/verify-email', 'App\Http\Controllers\Auth\RetrieveAccountController@verifyEmail')->name('retrieve.account.verify');
Route::middleware(['session.timeout'])->group(function () {

Route::get('/set-session', [SessionController::class, 'setSession']);
Route::get('/get-session', [SessionController::class, 'getSession']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'nonadmin'])->group(function () {
Route::get('/connections', [ExampleController::class, "connections"])->name('connections');
Route::get('/dashboard', [ExampleController::class, "dashboard"]);
Route::get('/ppp', [ExampleController::class, "ppp"]);
Route::get('/profile1', [ExampleController::class, "profile1"]);
Route::get('/profile2', [ExampleController::class, "profile2"]);
Route::get('/requests', [ExampleController::class, "requests"]);

// Route::get('/step1', [ExampleController::class, "step1"])->name('step1');
// Route::get('/step2', [ExampleController::class, "step2"]);
// Route::get('/step3', [ExampleController::class, "step3"]);
// Route::get('/step4', [ExampleController::class, "step4"]);
Route::get('/userProfile', [ExampleController::class, "userProfile"]);

Route::get('/contact', [ExampleController::class, 'contact'])->name('contact');

Route::get('profile2', [PreferencesController::class, 'displayProfile2'])->name('profile2');
Route::get('profile1', [UserController::class, 'displayProfile1'])->name('profile1');



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/saveUserData', [PreferencesController::class, 'saveUserData'])->name('saveUserData');
Route::post('/updateUserData', [PreferencesController::class, 'updateUserData'])->name('updateUserData');


Route::get('/user/{id}', [UserProfileController::class, 'userProfile'])->name('user.profile');


Route::get('/requests', [ConnectionsController::class, 'pendingConnectionRequests'])->name('requests');
Route::post('/accept-connection', [ConnectionsController::class, 'acceptConnection'])->name('acceptConnection');
Route::post('/deleteRequest', [ConnectionsController::class, 'deleteRequest'])->name('deleteRequest');
Route::get('/connections', [ConnectionsController::class, 'myConnections'])->name('my.connections');
Route::get('/userProfile', [ConnectionsController::class, 'myConnections'])->name('my.connections');
Route::get('/remove-connection/{connectionid}', [ConnectionsController::class, 'removeConnection'])->name('remove.connection');



Route::get('/add-profile/{profileId}', [UserProfileController::class, 'addProfile'])->name('add.profile');
Route::get('/dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
Route::post('/store-avatar', [PreferencesController::class, 'storeAvatar'])->name('store.avatar');


Route::post('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('softDeleteUser');
Route::post('/connections/{connectionid}',[userContactsController::class,'sendContact'])->name('sendContact');
Route::get('/contact', [userContactsController::class, 'receivedContacts'])->name('received.contacts');
});

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/update-timetable', 'UserPreferencesController@updateTimetable')->name('update.timetable');
});