<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ProfessionelController;
use App\Http\Controllers\API\RaitingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::get('profil', [LoginController::class, 'profil']);
Route::post('profil', [LoginController::class, 'profil_update']);


Route::get('user_image', [LoginController::class, 'user_image']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('sub_category/{id}', [CategoryController::class, 'subcategory']);
Route::get('prof/{id}/{user_id}', [ProfessionelController::class, 'index']);
Route::get('prof_details/{id}', [ProfessionelController::class, 'prof_details']);
Route::post('raiting', [RaitingController::class, 'index']);

Route::post('prof_category', [ProfessionelController::class, 'prof_category']);
Route::get('favori_list/{user_id}', [ProfessionelController::class, 'favori_list']);
Route::post('add_favori', [ProfessionelController::class, 'add_favori']);
Route::post('remove_favori', [ProfessionelController::class, 'remove_favori']);




Route::middleware('auth:api')->group(function () {

});
