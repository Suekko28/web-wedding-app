<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NamaUndanganDesign1Controller;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    Route::resource('/wedding-design1', WeddingDesign1Controller::class);
    Route::get('/wedding-design1', [WeddingDesign1Controller::class, 'index'])->name('wedding-design1');
    // Route::get('/wedding-design1/{id}/show', [WeddingDesign1Controller::class, 'show'])->name('wedding-design1.show');

});

Route::middleware(['auth', 'psi'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });
    Route::resource('/wedding-design1', WeddingDesign1Controller::class);
    Route::get('/wedding-design1', [WeddingDesign1Controller::class, 'index'])->name('wedding-design1');


});

Route::resource('/nama-undangan', NamaUndanganDesign1Controller::class);
Route::get('/nama-undangan/design1/{id}/list', [NamaUndanganDesign1Controller::class, 'index'])->name('nama-undangan-list');
Route::get('/nama-undangan/design1/{id}/create', [NamaUndanganDesign1Controller::class, 'create'])->name('nama-undangan-create');
Route::get('/nama-undangan/design1/{id}/edit', [NamaUndanganDesign1Controller::class, 'edit'])->name('nama-undangan-edit');
Route::post('/nama-undangan/design1/{id}/list', [NamaUndanganDesign1Controller::class, 'store'])->name('nama-undangan-store');
Route::put('/nama-undangan/design1/{undangandesign1Id}/{id}', [NamaUndanganDesign1Controller::class, 'update'])->name('nama-undangan-update');
Route::delete('/nama-undangan/design1/{id}', [NamaUndanganDesign1Controller::class, 'destroy'])->name('nama-undangan.destroy');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
