<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmailCheckerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/account/login',[UserController::class,'alumniLogin']);
Route::post('/user',[UserController::class,'store']);
// check email is real or not
Route::post('/email/checker',[EmailCheckerController::class,'email_checker']);



Route::group(['middleware'=>['auth:sanctum']], function(){
    //===========Api user routes ===============
    Route::get('/users',[UserController::class,'index']);
    // Route::post('/users',[UserController::class,'store']);
    Route::get('/users/{id}',[UserController::class,'show']);
    Route::put('/users/{id}',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'destroy']);
    // ===============api for workExperience =============
    Route::get('/experiences',[WorkExperienceController::class,'index']);
    Route::post('/experiences',[WorkExperienceController::class,'store']);
    Route::get('/experiences/{id}',[WorkExperienceController::class,'show']);
    Route::put('/experiences/{id}',[WorkExperienceController::class,'update']);
    Route::get('/experiences/alumni/{id}',[WorkExperienceController::class,'getWEbyAlumin']);
    // ===============api for company ============
    Route::get('/companies',[CompanyController::class,'index']);
    Route::post('/companies',[CompanyController::class,'store']);
    Route::get('/companies/{id}',[CompanyController::class,'show']);
    Route::put('/companies/{id}',[CompanyController::class,'update']);
    // ============== api for batches ==============
    Route::get('/batches',[BatchController::class,'index']);
    Route::post('/batches',[BatchController::class,'store']);
    Route::put('/batches/{id}',[BatchController::class,'update']);
    // ============== api for majors ==============
    Route::get('/majors',[MajorController::class,'index']);
    Route::post('/majors',[MajorController::class,'store']);
    Route::post('/majors/{id}',[MajorController::class,'update']);
    // ============== api for alumni ==============
    Route::get('/alumni',[AlumniController::class,'index']);
    Route::get('/alumni/{id}',[AlumniController::class,'show']);
    Route::post('/alumni',[AlumniController::class,'store']);
    Route::post('/alumni/{id}',[AlumniController::class,'update']);
    Route::get('/alumni/user/{id}',[AlumniController::class,'getAlumniByUser']);
    // ============== api for authentication ================ 
    Route::post('/account/logout',[UserController::class,'loggedOut']);

});
