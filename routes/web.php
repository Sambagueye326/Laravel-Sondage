<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware'=> 'guest'], function (){
    Route::get('/register', [\App\Http\Controllers\AuthController::class,'register'])->name("register");
    Route::post('/register', [\App\Http\Controllers\AuthController::class,'registerPost'])->name("register");
    Route::get('/login', [\App\Http\Controllers\AuthController::class,'login'])->name("login");
    Route::post('/login', [\App\Http\Controllers\AuthController::class,'loginPost'])->name("login");
});

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name("home");
    Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name("logout");
    Route::get('/profile',[\App\Http\Controllers\AuthController::class,'profile'])->name('profile');

    Route::controller(\App\Http\Controllers\ProgrammeController::class)->prefix('programmes')->group(function (){
        Route::get('','index')->name('programmes');
        Route::get('create','create')->name('programmes.create');
        Route::post('store','store')->name('programmes.store');
        Route::get('edit/{id}','edit')->name('programmes.edit');
        Route::put('edit/{id}','update')->name('programmes.update');
        Route::delete('destroy/{id}','destroy')->name('programmes.destroy');
    });

    Route::controller(\App\Http\Controllers\ProfileController::class)->prefix('profile')->group(function (){
        Route::get('','index')->name('profile');
        Route::get('create','create')->name('profile.create');
        Route::post('store','store')->name('profile.store');
        Route::get('edit/{id}','edit')->name('profile.edit');
        Route::put('edit/{id}','update')->name('profile.update');
        Route::delete('destroy/{id}','destroy')->name('profile.destroy');
    });
    Route::post('/toggle-like/{likedItemId}/{likedItemType}', [\App\Http\Controllers\LikeController::class, 'toggleLike'])->name('toggle-like');

});





