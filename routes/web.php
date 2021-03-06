<?php

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
    return view('welcome');
});

Auth::routes();

Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile')->middleware('auth');
Route::get('/home', 'HomeController@index');
Route::get('/search', 'ThreadController@search');

// Thread Routes
    Route::get('/threads', function() {
        $threads=App\Thread::paginate(15);
        return view('thread.index', compact('threads'));
    });

    Route::resource('/thread', 'ThreadController');

// Comment Routes
    Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);
    Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/change-status', 'AdminController@changeStatus')->name('change.status');

    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Register route
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});