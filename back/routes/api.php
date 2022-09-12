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

<<<<<<< HEAD
=======
Route::apiResource('/batches',BatchController::class);
Route::apiResource('/majors',MajorController::class);
Route::apiResource('/alumni',AlumniController::class);
>>>>>>> dfae790515170fdc2cb5eb1ceb48f5afeefaf79b
Route::apiResource('/users',UserController::class);
// ===========Api for Position ============
Route::get('/position',[PositionController::class,'index']);
Route::post('/position',[PositionController::class,'store']);
Route::get('/position/{id}',[PositionController::class,'show']);
// ===============api for workExperience =============
Route::get('/experience',[WorkExperienceController::class,'index']);
Route::post('/experience',[WorkExperienceController::class,'store']);
Route::get('/experience/{id}',[WorkExperienceController::class,'show']);
Route::put('/experience/{id}',[WorkExperienceController::class,'update']);
// ===============api for company ============
Route::get('/company',[CompanyController::class,'index']);
Route::post('/company',[CompanyController::class,'store']);
Route::get('/company/{id}',[CompanyController::class,'show']);
<<<<<<< HEAD
Route::post('/company/{id}',[CompanyController::class,'update']);
// ===========Api for Position ============
Route::get('/position',[PositionController::class,'index']);
Route::post('/position',[PositionController::class,'store']);
Route::get('/position/{id}',[PositionController::class,'show']);

Route::apiResource('/batch',BatchController::class);
Route::apiResource('/major',MajorController::class);
Route::apiResource('/alumni',AlumniController::class);
Route::apiResource('/users',UserController::class);


Route::apiResource('/batches',BatchController::class);
Route::apiResource('/majors',MajorController::class);
Route::apiResource('/alumnis',AlumniController::class);
Route::apiResource('/users',UserController::class);

=======
Route::post('/company/{id}',[CompanyController::class,'update']);
>>>>>>> dfae790515170fdc2cb5eb1ceb48f5afeefaf79b
