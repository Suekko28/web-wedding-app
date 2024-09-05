<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WeddingDesign1Controller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Route::get('/wedding-design1', function () {
//     return view('wedding-design1.index');
// });

// Route::get('/wedding-design1/create', function () {
//     return view('wedding-design1.create');
// });

Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    Route::resource('/wedding-design1', WeddingDesign1Controller::class);
    Route::get('/wedding-design1', [WeddingDesign1Controller::class, 'index'])->name('wedding-design1')->middleware('auth');

});

Route::middleware(['auth', 'psi'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });
    Route::resource('/wedding-design1', WeddingDesign1Controller::class);
    Route::get('/wedding-design1', [WeddingDesign1Controller::class, 'index'])->name('wedding-design1')->middleware('auth');


});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
