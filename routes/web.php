<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::view('register','register')->name('register');
// Route::post('registerSave',[UserController::class,'register'])->name('registerSave');

// Route::view('login','login')->name('login');
// Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');

// Route::get('dashboard',[UserController::class,'dashboardPage'])
// ->name('dashboard')->middleware([ValidUser::class,TestUser::class]);

// Route::get('dashboard/inner',[UserController::class,'innerPage'])->name('inner')->middleware(ValidUser::class);
// Route::get('logout',[UserController::class,'logout'])->name('logout');

// after alise middleware---->>>>

Route::view('register','register')->name('register');
Route::post('registerSave',[UserController::class,'register'])->name('registerSave');

Route::view('login','login')->name('login');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');
Route::get('logout',[UserController::class,'logout'])->name('logout');

// after alise middleware name

// Route::get('dashboard',[UserController::class,'dashboardPage'])
// ->name('dashboard')->middleware(['isuservalid',TestUser::class]);

// Route::get('dashboard/inner',[UserController::class,'innerPage'])
// ->name('inner')->middleware(['isuservalid',TestUser::class]);


// middelware with group and withoutmiddleware

// Route::middleware(['isuservalid',TestUser::class])->group(function(){
//  Route::get('dashboard',[UserController::class,'dashboardPage'])
// ->name('dashboard');

// Route::get('dashboard/inner',[UserController::class,'innerPage'])
// ->name('inner')->withoutMiddleware([TestUser::class]);
// });


// withoutmiddleware 2nd method
// Route::withoutMiddleware([TestUser::class])->group(function(){
//    Route::get('dashboard/inner',[UserController::class,'innerPage'])
//    ->name('inner');
//    });

// group middleware

Route::middleware(['new-group'])->group(function(){
    Route::get('dashboard',[UserController::class,'dashboardPage'])
   ->name('dashboard');

   Route::get('dashboard/inner',[UserController::class,'innerPage'])
   ->name('inner')->withoutMiddleware([TestUser::class]);
   });
