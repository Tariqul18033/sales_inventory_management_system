<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;





Route::get('/', function () {
    return view('welcome');
});
Route::get('/userRegister', function () {
    return view('test');
    
});
Route::post('/userRegister', [UserController::class, 'userRegister']);