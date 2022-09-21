<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProffessionelController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('login', [LoginController::class, 'login'])->name('login.custom');
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::post('logout',  [LoginController::class, 'logout'])->name('logout');
Route::post('feedback',  [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfilController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfilController::class, 'update'])->name('update-profile');
    Route::post('/profile-password', [ProfilController::class, 'updatePassword'])->name('passowrd-update');
    Route::get('/dashboard' , [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/societe', [CompanyController::class, 'index'])->name('company');
    Route::post('/verif/company', [CompanyController::class, 'verification'])->name('company.verification');
    Route::post('/delete/company', [CompanyController::class, 'delete'])->name('company.delete');
    Route::post('/restore/company', [CompanyController::class, 'restore'])->name('company.restore');

    Route::get('/clients', [ClientController::class, 'index'])->name('client');
    Route::post('/verif/client', [ClientController::class, 'verification'])->name('client.verification');
    Route::post('/delete/client', [ClientController::class, 'delete'])->name('client.delete');
    Route::post('/restore/client', [ClientController::class, 'restore'])->name('client.restore');

    Route::get('/prof', [ProffessionelController::class, 'index'])->name('prof');
    Route::post('/prof', [ProffessionelController::class, 'store'])->name('prof.store');

    Route::post('/verif/prof', [ProffessionelController::class, 'verification'])->name('prof.verification');
    Route::post('/delete/prof', [ProffessionelController::class, 'delete'])->name('prof.delete');
    Route::post('/restore/prof', [ProffessionelController::class, 'restore'])->name('prof.restore');
    
    Route::post('prof_category', [ProffessionelController::class, 'affect_category'])->name('prof_affect_category');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [categoryController::class, 'store'])->name('category.store');
    Route::post('/sous_category', [categoryController::class, 'sous_category_store'])->name('sous_category.store');
    Route::post('/delete/category', [categoryController::class, 'delete'])->name('category.delete');
    Route::post('/restore/category', [categoryController::class, 'restore'])->name('category.restore');
    Route::post('/delete/sous_category', [categoryController::class, 'sub_category_delete'])->name('sub_category.delete');
    Route::post('/restore/sous_category', [categoryController::class, 'sub_category_restore'])->name('sub_category.restore');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

    Route::get('/reclamation', [FeedbackController::class, 'reclamation'])->name('reclamation');
    Route::post('/update/reclamation', [FeedbackController::class, 'update_reclamation'])->name('reclamation.update');

});
