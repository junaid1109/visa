<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\User\CardController as UserCard;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\TreasuryController;
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
    return view('user/login');
});

Route::get('/jdanuiatarh', function () {
    return view('reset-password');
})->name('jdanuiatarh');

Route::post('/reset-password',[UserController::class,'updatePassword'])->name('reset-password');

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::get('/login',[AuthController::class,'login'])->name('login');
          Route::post('/check',[UserController::class,'check'])->name('check');
        //   Route::post('/create',[UserController::class,'create'])->name('create');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('/home',[AuthController::class,'dashboard'])->name('home');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
        Route::get('/add-new',[UserController::class,'add'])->name('add');
        Route::get('/card',[UserCard::class,'index'])->name('card');
        Route::post('/card',[UserCard::class,'store'])->name('card.store');
        Route::post('/card/toggle-status/{id}', [UserCard::class, 'toggleStatus'])->name('card.toggleStatus');
        Route::post('/fetchCard',[UserCard::class,'fetchCard'])->name('fetchCard');
        Route::get('/treasury',[TreasuryController::class,'index'])->name('treasury');
        Route::get('/settings',[AuthController::class,'settings'])->name('settings');
        Route::post('/settings-store',[AuthController::class,'settingsStore'])->name('settings.store');

        Route::get('/api',[UserController::class,'api'])->name('api');

    });

});

Route::prefix('vrtvrtregrtrtbteyb')->name('vrtvrtregrtrtbteyb.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/','admin/login')->name('login');
          Route::view('/login','admin/login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){

        Route::get('/home',[AdminController::class,'dashboard'])->name('home');
        Route::post('/add',[AdminController::class,'store'])->name('add');
        Route::get('/card',[CardController::class,'index'])->name('card');
        Route::post('/card/update',[CardController::class,'update'])->name('card.update');
        Route::post('/fetchCard',[CardController::class,'fetchCard'])->name('fetchCard');
        Route::get('/loginAsMember',[AdminController::class,'loginAsMember'])->name('loginAsMember');
        Route::get('/api',[AdminController::class,'api'])->name('api');
        Route::post('/api-store',[AdminController::class,'apiStore'])->name('api.store');

        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });

});
