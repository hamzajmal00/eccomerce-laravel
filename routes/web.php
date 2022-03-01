<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login',[AdminController::class, 'LoginForm']);
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    
});

//Admin Profile
Route::get('/admin/profile',[AdminProfileController::class, 'profileView'])->name('admin.profile');
Route::get('/admin/profile/edit/',[AdminProfileController::class, 'profileEdit'])->name('profile.edit');
Route::post('/admin/profile/update/',[AdminProfileController::class, 'profileUpdate'])->name('admin.profile.update');
Route::get('/admin/profile/changepass/',[AdminProfileController::class, 'ChangePass'])->name('admin.profile.changepass');
Route::post('/admin/profile/storepass/',[AdminProfileController::class, 'storePass'])->name('admin.profile.storepass');

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'homePage'])->name('home');
Route::get('/login', [IndexController::class, 'loginPage'])->name('login');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('profile.show');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('profile.store');
Route::get('/user/logout', [IndexController::class, 'userlogout'])->name('user.logout');
Route::get('/user/changepassword', [IndexController::class, 'userChangePass'])->name('user.change.pass');
Route::post('/user/pass/store', [IndexController::class, 'userPassStore'])->name('user.password.update');

