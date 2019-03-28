<?php

use App\Http\Controllers\Users\DashboardController as LoginsDashboardController;
use App\Http\Controllers\Users\LockController;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


// Login dashboard routes 
Route::match(['get', 'delete'], '/logins/verwijder/{user}', [LoginsDashboardController::class, 'destroy'])->name('users.delete');
Route::get('/login/undo/{trashedUser}', [LoginsDashboardController::class, 'undoDeleteRoute'])->name('users.delete.undo');
Route::get('/logins/{filter?}', [LoginsDashboardController::class, 'index'])->name('users.index');

// Login lock routes
Route::get('/deactiveer/{userEntity}', [LockController::class, 'create'])->name('users.lock');