<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddware;

// frontend routes

Route::get('/',[HomeController::class,'HomePage']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/categoryPage',[CategoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);





Route::post('/user-register', [UserController::class, 'userRegister']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::post('/send-otp', [UserController::class, 'sendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'verifyOTP']);
Route::post('/reset-password', [UserController::class, 'resetPassword'])
->middleware(TokenVerificationMiddware::class);