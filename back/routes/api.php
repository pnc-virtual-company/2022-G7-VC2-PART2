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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ===========Api for Position ============
Route::get('/positions',[PositionController::class,'index']);
Route::post('/positions',[PositionController::class,'store']);
Route::get('/positions/{id}',[PositionController::class,'show']);
// ===============api for workExperience =============
Route::get('/experiences',[WorkExperienceController::class,'index']);
Route::post('/experiences',[WorkExperienceController::class,'store']);
Route::get('/experiences/{id}',[WorkExperienceController::class,'show']);
Route::put('/experiences/{id}',[WorkExperienceController::class,'update']);
// ===============api for company ============
Route::get('/companies',[CompanyController::class,'index']);
Route::post('/companies',[CompanyController::class,'store']);
Route::get('/companies/{id}',[CompanyController::class,'show']);
Route::post('/companies/{id}',[CompanyController::class,'update']);
// ============== api for batches ==============
Route::get('/batches',[BatchController::class,'index']);
Route::post('/batches',[BatchController::class,'store']);
Route::post('/batches/{id}',[BatchController::class,'update']);
// ============== api for majors ==============
Route::get('/majors',[MajorController::class,'index']);
Route::post('/majors',[MajorController::class,'store']);
Route::post('/majors/{id}',[MajorController::class,'update']);
// ============== api for alumni ==============
Route::get('/alumni',[AlumniController::class,'index']);
Route::post('/alumni',[AlumniController::class,'store']);
Route::post('/alumni/{id}',[AlumniController::class,'update']);
Route::apiResource('/users',UserController::class);


