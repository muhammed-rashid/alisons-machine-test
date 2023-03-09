<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return redirect()->route('admin.auth.login');
});

Route::prefix('admin')->as('admin.')->group(function(){
    //admin authentication
    Route::prefix('auth')->as('auth.')->group(function(){
        Route::get('/login',[AuthController::class,'login'])->name('login');
        Route::post('/login',[AuthController::class,'doLogin'])->name('do-login');
        Route::get('/logout',[AuthController::class,'logOut'])->name('logout'); 
    });
    //admin dashboard
    Route::middleware('auth:admin')->group(function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');

        //companees
        Route::resource('/company',CompanyController::class);
        Route::resource('/employee',EmployeeController::class);


        
    });


});



?>