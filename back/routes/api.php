<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;

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

//===========Api user routes ===============
Route::get('/users',[UserController::class,'index']);
Route::post('/users',[UserController::class,'store']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']);
Route::put('/users/updateimage/{id}',[UserController::class,"updateUserimage"]);

// ===============api for workExperience =============
Route::get('/experiences',[WorkExperienceController::class,'index']);
Route::post('/experiences',[WorkExperienceController::class,'store']);
Route::get('/experiences/{id}',[WorkExperienceController::class,'show']);
Route::put('/experiences/{id}',[WorkExperienceController::class,'update']);
Route::delete('/experiences/{id}',[WorkExperienceController::class,'destroy']);
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
Route::get('/alumni/{id}',[AlumniController::class,'show']);
// ============ api alumni school ==================
Route::post('/school',[SchoolController::class,'store']);
Route::get('/school',[SchoolController::class,'index']);
Route::get('/school/{id}',[SchoolController::class,'show']);
Route::put('/school/{id}',[SchoolController::class,'update']);
Route::delete('/school/{id}',[SchoolController::class,'destroy']);
Route::get('/school/alumni/{id}',[SchoolController::class,'getByAlumniId']);
// ================= api for skill =============
Route::get('/skills',[SkillController::class,'index']);
Route::post('/skills',[SkillController::class,'store']);
Route::delete('/skills/{id}',[SkillController::class,'destroy']);
Route::get('/skills/alumni/{id}',[SkillController::class,'getSkillbyAlumin']);
