<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AilmentController;
use App\Http\Controllers\LetterheadController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\VisitController;
use App\Models\Letterhead;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard', HomeController::class)->names('home');

Auth::routes();

Route::resource('patients', PatientController::class);

Route::resource('products', ProductController::class);

Route::resource('ailments', AilmentController::class);

Route::resource('patients/{patient}/visits', VisitController::class)->names('patients.visits');

Route::resource('patients/{patient}/visits/{visit}/treatments', TreatmentController::class)->names('patients.visits.treatments');
Route::get('patients/{patient}/visits/{visit}/treatments/{treatment}/print', [TreatmentController::class,'print'])->name('patients.visits.treatments.print');
