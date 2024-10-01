<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CetakFotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GambarinController;
use App\Http\Controllers\HomeDesign1Controller;
use App\Http\Controllers\HomeDesign2Controller;
use App\Http\Controllers\HomeDesign3Controller;
use App\Http\Controllers\IndexDesign1Controller;
use App\Http\Controllers\IndexDesign2Controller;
use App\Http\Controllers\IndexDesign3Controller;
use App\Http\Controllers\InformasiDesign4Controller;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NamaUndanganDesign1Controller;
use App\Http\Controllers\NamaUndanganDesign2Controller;
use App\Http\Controllers\NamaUndanganDesign3Controller;
use App\Http\Controllers\PerjalananCintaDesign4Controller;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SeserahanController;
use App\Http\Controllers\UndanganDigitalController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserCetakFotoController;
use App\Http\Controllers\UserGambarinController;
use App\Http\Controllers\UserSeserahanController;
use App\Http\Controllers\UserUndanganDigitalController;
use App\Http\Controllers\WeddingDesign1Controller;
use App\Http\Controllers\WeddingDesign2Controller;
use App\Http\Controllers\WeddingDesign3Controller;
use App\Http\Controllers\WeddingDesign4Controller;
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
    'register' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    Route::resource('/wedding-design1', WeddingDesign1Controller::class);

    Route::resource('/wedding-design2', WeddingDesign2Controller::class);

    Route::resource('/wedding-design3', WeddingDesign3Controller::class);

    Route::resource('/wedding-design4', InformasiDesign4Controller::class);
    Route::post('/wedding-design4/{id}/update', [InformasiDesign4Controller::class, 'update']);

    // Routes for WeddingDesign4
    Route::get('/wedding-design4/{id}/create', [WeddingDesign4Controller::class, 'create'])->name('form-design4.create');
    Route::post('/wedding-design4/{id}/store', [WeddingDesign4Controller::class, 'store'])->name('form-design4.store');
    Route::get('/wedding-design4/{informasiDesign4Id}/edit/{id}', [WeddingDesign4Controller::class, 'edit'])->name('form-design4.edit');
    Route::put('/wedding-design4/{informasiDesign4Id}/update/{id}', [WeddingDesign4Controller::class, 'update'])->name('form-design4.update');
    Route::delete('/wedding-design4/{id}', [WeddingDesign4Controller::class, 'destroy'])->name('form-design4.destroy');

    // Route::resource('perjalanancinta-design4', PerjalananCintaDesign4Controller::class);
    Route::post('/wedding-design4/{weddingDesign4Id}/store', [PerjalananCintaDesign4Controller::class, 'store'])->name('perjalanancinta-design4.store');



    Route::resource('/blog', BlogController::class);

    Route::resource('/promo', PromoController::class);

    Route::resource('/gambarin', GambarinController::class);

    Route::resource('/seserahan', SeserahanController::class);

    Route::resource('/cetakfoto', CetakFotoController::class);

    Route::resource('/undangandigital', UndanganDigitalController::class);



});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });
    Route::resource('/wedding-design1', WeddingDesign1Controller::class);

    Route::resource('/wedding-design2', WeddingDesign2Controller::class);



});

// Route undangan design 1
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/=')->group(function () {
    Route::get('/preview', [HomeDesign1Controller::class, 'show'])->name('wedding-design1-home-preview');
    Route::get('/preview/index', [IndexDesign1Controller::class, 'show'])->name('wedding-design1-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}', [HomeDesign1Controller::class, 'showDetail'])->name('wedding-design1-home');
Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign1Controller::class, 'showDetail'])->name('wedding-design1-index');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign1Controller::class, 'store'])->name('wedding-design1-post');


Route::resource('/nama-undangan', NamaUndanganDesign1Controller::class);
Route::get('/nama-undangan/design1/{id}/list', [NamaUndanganDesign1Controller::class, 'index'])->name('nama-undangan-list1');
Route::get('/nama-undangan/design1/{id}/create', [NamaUndanganDesign1Controller::class, 'create'])->name('nama-undangan-create1');
Route::get('/nama-undangan/design1/{id}/edit', [NamaUndanganDesign1Controller::class, 'edit'])->name('nama-undangan-edit1');
Route::post('/nama-undangan/design1/{id}/list', [NamaUndanganDesign1Controller::class, 'store'])->name('nama-undangan-store1');
Route::put('/nama-undangan/design1/{weddingDesign1Id}/{id}', [NamaUndanganDesign1Controller::class, 'update'])->name('nama-undangan-update1');
Route::delete('/nama-undangan/design1/{id}', [NamaUndanganDesign1Controller::class, 'destroy'])->name('nama-undangan.destroy1');



// Route undangan design 2
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/=untuk')->group(function () {
    Route::get('/preview', [HomeDesign2Controller::class, 'show'])->name('wedding-design2-home-preview');
    Route::get('/preview/index', [IndexDesign2Controller::class, 'show'])->name('wedding-design2-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}', [HomeDesign2Controller::class, 'showDetail'])->name('wedding-design2-home');
Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign2Controller::class, 'showDetail'])->name('wedding-design2-index');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign2Controller::class, 'store'])->name('wedding-design2-post');

Route::resource('/nama-undangan', NamaUndanganDesign2Controller::class);
Route::get('/nama-undangan/design2/{id}/list', [NamaUndanganDesign2Controller::class, 'index'])->name('nama-undangan-list2');
Route::get('/nama-undangan/design2/{id}/create', [NamaUndanganDesign2Controller::class, 'create'])->name('nama-undangan-create2');
Route::get('/nama-undangan/design2/{id}/edit', [NamaUndanganDesign2Controller::class, 'edit'])->name('nama-undangan-edit2');
Route::post('/nama-undangan/design2/{id}/list', [NamaUndanganDesign2Controller::class, 'store'])->name('nama-undangan-store2');
Route::put('/nama-undangan/design2/{weddingDesign2Id}/{id}', [NamaUndanganDesign2Controller::class, 'update'])->name('nama-undangan-update2');
Route::delete('/nama-undangan/design2/{id}', [NamaUndanganDesign2Controller::class, 'destroy'])->name('nama-undangan.destroy2');


// Route undangan design 3
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/=to')->group(function () {
    Route::get('/preview', [HomeDesign3Controller::class, 'show'])->name('wedding-design3-home-preview');
    Route::get('/preview/index', [IndexDesign3Controller::class, 'show'])->name('wedding-design3-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}', [HomeDesign3Controller::class, 'showDetail'])->name('wedding-design3-home');
Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign3Controller::class, 'showDetail'])->name('wedding-design3-index');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/={nama_undangan}/index', [IndexDesign3Controller::class, 'store'])->name('wedding-design3-post');

Route::resource('/nama-undangan', NamaUndanganDesign3Controller::class);
Route::get('/nama-undangan/design3/{id}/list', [NamaUndanganDesign3Controller::class, 'index'])->name('nama-undangan-list3');
Route::get('/nama-undangan/design3/{id}/create', [NamaUndanganDesign3Controller::class, 'create'])->name('nama-undangan-create3');
Route::get('/nama-undangan/design3/{id}/edit', [NamaUndanganDesign3Controller::class, 'edit'])->name('nama-undangan-edit3');
Route::post('/nama-undangan/design3/{id}/list', [NamaUndanganDesign3Controller::class, 'store'])->name('nama-undangan-store3');
Route::put('/nama-undangan/design3/{weddingDesign3Id}/{id}', [NamaUndanganDesign3Controller::class, 'update'])->name('nama-undangan-update3');
Route::delete('/nama-undangan/design3/{id}', [NamaUndanganDesign3Controller::class, 'destroy'])->name('nama-undangan.destroy3');



// User Route

Route::resource('/', LandingPageController::class);
Route::resource('/blog-view', UserBlogController::class);
Route::resource('/gambarin-view', UserGambarinController::class);
Route::resource('/seserahan-view', UserSeserahanController::class);
Route::resource('/cetakfoto-view', UserCetakFotoController::class);
Route::resource('/undangandigital-view', UserUndanganDigitalController::class);

Route::get('/template', function () {
    return view('index');
});


Route::get('/wedding-1', function () {
    return view('wedding-design1.home-preview');
});

Route::get('/wedding-1/index', function () {
    return view('wedding-design1.index-preview');
});


Route::get('/wedding-2', function () {
    return view('wedding-design2.home-preview');
});

Route::get('/wedding-2/index', function () {
    return view('wedding-design2.index-preview');
});

Route::get('/wedding-3', function () {
    return view('wedding-design3.home-preview');
});

Route::get('/wedding-3/index', function () {
    return view('wedding-design3.index-preview');
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Linkdes Succesfully';
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
