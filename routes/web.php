<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');

Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');

Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');

Route::put('/patients/{patient}/update', [PatientController::class, 'update'])->name('patients.update');

Route::delete('/patients/{patient}/delete', [PatientController::class, 'destroy'])->name('patients.destroy');



Route::get('/get-palities/{district_id}', [PatientController::class, 'getPalities']);

