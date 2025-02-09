<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// user ragistration
Route::post('/userRegister', [UserController::class, 'userRegister']);s