<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('car');
});
Route::controller(AdminController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

});

Route::resource('resources', 'ResourceController');




// List resources
Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');

// Show the form for creating a new resource
Route::get('/resources/create', [ResourceController::class, 'create'])->name('resources.create');

// Store a newly created resource in storage
Route::post('/resources', [ResourceController::class, 'store'])->name('resources.store');

// Show the form for editing the specified resource
Route::get('/resources/{resource}/edit', [ResourceController::class, 'edit'])->name('resources.edit');

// Update the specified resource in storage
Route::put('/resources/{resource}', [ResourceController::class, 'update'])->name('resources.update');

// Remove the specified resource from storage
Route::delete('/resources/{resource}', [ResourceController::class, 'destroy'])->name('resources.destroy');
