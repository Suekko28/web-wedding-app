<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CetakFotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GambarinController;
use App\Http\Controllers\HomeDesign1Controller;
use App\Http\Controllers\HomeDesign2Controller;
use App\Http\Controllers\HomeDesign3Controller;
use App\Http\Controllers\HomeDesign4Controller;
use App\Http\Controllers\HomeDesign5Controller;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\IndexDesign1Controller;
use App\Http\Controllers\IndexDesign2Controller;
use App\Http\Controllers\IndexDesign3Controller;
use App\Http\Controllers\IndexDesign4Controller;
use App\Http\Controllers\InformasiDesign4Controller;
use App\Http\Controllers\InformasiDesign5Controller;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NamaUndanganDesign1Controller;
use App\Http\Controllers\NamaUndanganDesign2Controller;
use App\Http\Controllers\NamaUndanganDesign3Controller;
use App\Http\Controllers\NamaUndanganDesign4Controller;
use App\Http\Controllers\NamaUndanganDesign5Controller;
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
use App\Http\Controllers\WeddingDesign5Controller;
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

Auth::routes([
    // 'register' => false,
    'verify' => false,

]);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    Route::resource('/wedding-design1', WeddingDesign1Controller::class);

    Route::resource('/wedding-design2', WeddingDesign2Controller::class);

    Route::resource('/wedding-design3', WeddingDesign3Controller::class);

    // Routes for InformasiDesign4
    Route::resource('/wedding-design4', InformasiDesign4Controller::class);
    Route::get('/wedding-design4/{wedding_design4}', [WeddingDesign4Controller::class, 'show'])->name('wedding-design4.show');
    Route::post('/wedding-design4/{id}/update', [InformasiDesign4Controller::class, 'update']);

    // Routes for WeddingDesign4
    Route::get('/wedding-design4/{id}/create', [WeddingDesign4Controller::class, 'create'])->name('form-design4.create');
    Route::post('/wedding-design4/{id}/store', [WeddingDesign4Controller::class, 'store'])->name('form-design4.store');
    Route::get('/wedding-design4/{informasiDesign4Id}/edit/{id}', [WeddingDesign4Controller::class, 'edit'])->name('form-design4.edit');
    Route::put('/wedding-design4/{informasiDesign4Id}/update/{id}', [WeddingDesign4Controller::class, 'update'])->name('form-design4.update');
    Route::delete('/wedding-design4/{id}', [WeddingDesign4Controller::class, 'destroy'])->name('form-design4.destroy');

    // Routes for Perjalanan Cinta4
    Route::post('/wedding-design4/{id}/store-perjalanan-cinta', [WeddingDesign4Controller::class, 'storePerjalananCinta'])->name('perjalanancinta-design4.store');
    Route::put('/wedding-design4/{id}/update-perjalanan-cinta', [WeddingDesign4Controller::class, 'updatePerjalananCinta'])->name('perjalanancinta-design4.update');
    Route::delete('/wedding-design4/{id}/delete', [WeddingDesign4Controller::class, 'destroyPerjalananCinta'])->name('perjalanancinta-design4.destroy');

    // Routes for Direct Transfer4
    Route::post('/wedding-design4/{id}/store-direct-transfer', [WeddingDesign4Controller::class, 'storeDirectTransfer'])->name('directtransfer-design4.store');
    Route::put('/wedding-design4/{id}/update-direct-transfer', [WeddingDesign4Controller::class, 'updateDirectTransfer'])->name('directtransfer-design4.update');
    Route::delete('/wedding-design4/{id}/delete', [WeddingDesign4Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design4.destroy');

    // Routes for Kirim Hadiah4
    Route::post('/wedding-design4/{id}/store-kirim-hadiah', [WeddingDesign4Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design4.store');
    Route::put('/wedding-design4/{id}/update-kirim-hadiah', [WeddingDesign4Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design4.update');
    Route::delete('/wedding-design4/{id}/delete', [WeddingDesign4Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design4.destroy');
    Route::delete('/wedding-design4/{id}/{type}/delete', [WeddingDesign4Controller::class, 'destroy'])->name('design4.destroy');


    // Routes for InformasiDesign5
    Route::resource('/wedding-design5', InformasiDesign5Controller::class);
    Route::get('/wedding-design5/{wedding_design5}', [WeddingDesign5Controller::class, 'show'])->name('wedding-design5.show');
    Route::post('/wedding-design5/{id}/update', [InformasiDesign5Controller::class, 'update']);

    // Routes for WeddingDesign5
    Route::get('/wedding-design5/{id}/create', [WeddingDesign5Controller::class, 'create'])->name('form-design5.create');
    Route::post('/wedding-design5/{id}/store', [WeddingDesign5Controller::class, 'store'])->name('form-design5.store');
    Route::get('/wedding-design5/{informasiDesign5Id}/edit/{id}', [WeddingDesign5Controller::class, 'edit'])->name('form-design5.edit');
    Route::put('/wedding-design5/{informasiDesign5Id}/update/{id}', [WeddingDesign5Controller::class, 'update'])->name('form-design5.update');
    Route::delete('/wedding-design5/{id}', [WeddingDesign5Controller::class, 'destroy'])->name('form-design5.destroy');

    // Routes for Perjalanan Cinta5
    Route::post('/wedding-design5/{id}/store-perjalanan-cinta', [WeddingDesign5Controller::class, 'storePerjalananCinta'])->name('perjalanancinta-design5.store');
    Route::put('/wedding-design5/{id}/update-perjalanan-cinta', [WeddingDesign5Controller::class, 'updatePerjalananCinta'])->name('perjalanancinta-design5.update');
    Route::delete('/wedding-design5/{id}/delete', [WeddingDesign5Controller::class, 'destroyPerjalananCinta'])->name('perjalanancinta-design5.destroy');

    // Routes for Direct Transfer5
    Route::post('/wedding-design5/{id}/store-direct-transfer', [WeddingDesign5Controller::class, 'storeDirectTransfer'])->name('directtransfer-design5.store');
    Route::put('/wedding-design5/{id}/update-direct-transfer', [WeddingDesign5Controller::class, 'updateDirectTransfer'])->name('directtransfer-design5.update');
    Route::delete('/wedding-design5/{id}/delete', [WeddingDesign5Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design5.destroy');

    // Routes for Kirim Hadiah5
    Route::post('/wedding-design5/{id}/store-kirim-hadiah', [WeddingDesign5Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design5.store');
    Route::put('/wedding-design5/{id}/update-kirim-hadiah', [WeddingDesign5Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design5.update');
    Route::delete('/wedding-design5/{id}/delete', [WeddingDesign5Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design5.destroy');
    Route::delete('/wedding-design5/{id}/{type}/delete', [WeddingDesign5Controller::class, 'destroy'])->name('design5.destroy');


    Route::resource('/blog', BlogController::class);
    Route::post('/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');

    Route::resource('/promo', PromoController::class);

    Route::resource('/gambarin', GambarinController::class);

    Route::resource('/seserahan', SeserahanController::class);

    Route::resource('/cetakfoto', CetakFotoController::class);

    Route::resource('/undangandigital', UndanganDigitalController::class);

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
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/untuk=')->group(function () {
    Route::get('/preview', [HomeDesign2Controller::class, 'show'])->name('wedding-design2-home-preview');
    Route::get('/preview/index', [IndexDesign2Controller::class, 'show'])->name('wedding-design2-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/untuk={nama_undangan}', [HomeDesign2Controller::class, 'showDetail'])->name('wedding-design2-home');
Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/untuk={nama_undangan}/index', [IndexDesign2Controller::class, 'showDetail'])->name('wedding-design2-index');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/untuk={nama_undangan}/index', [IndexDesign2Controller::class, 'store'])->name('wedding-design2-post');

Route::resource('/nama-undangan', NamaUndanganDesign2Controller::class);
Route::get('/nama-undangan/design2/{id}/list', [NamaUndanganDesign2Controller::class, 'index'])->name('nama-undangan-list2');
Route::get('/nama-undangan/design2/{id}/create', [NamaUndanganDesign2Controller::class, 'create'])->name('nama-undangan-create2');
Route::get('/nama-undangan/design2/{id}/edit', [NamaUndanganDesign2Controller::class, 'edit'])->name('nama-undangan-edit2');
Route::post('/nama-undangan/design2/{id}/list', [NamaUndanganDesign2Controller::class, 'store'])->name('nama-undangan-store2');
Route::put('/nama-undangan/design2/{weddingDesign2Id}/{id}', [NamaUndanganDesign2Controller::class, 'update'])->name('nama-undangan-update2');
Route::delete('/nama-undangan/design2/{id}', [NamaUndanganDesign2Controller::class, 'destroy'])->name('nama-undangan.destroy2');


// Route undangan design 3
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/to=')->group(function () {
    Route::get('/preview', [HomeDesign3Controller::class, 'show'])->name('wedding-design3-home-preview');
    Route::get('/preview/index', [IndexDesign3Controller::class, 'show'])->name('wedding-design3-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/to={nama_undangan}', [HomeDesign3Controller::class, 'showDetail'])->name('wedding-design3-home');
Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/to={nama_undangan}/index', [IndexDesign3Controller::class, 'showDetail'])->name('wedding-design3-index');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/to={nama_undangan}/index', [IndexDesign3Controller::class, 'store'])->name('wedding-design3-post');

Route::resource('/nama-undangan', NamaUndanganDesign3Controller::class);
Route::get('/nama-undangan/design3/{id}/list', [NamaUndanganDesign3Controller::class, 'index'])->name('nama-undangan-list3');
Route::get('/nama-undangan/design3/{id}/create', [NamaUndanganDesign3Controller::class, 'create'])->name('nama-undangan-create3');
Route::get('/nama-undangan/design3/{id}/edit', [NamaUndanganDesign3Controller::class, 'edit'])->name('nama-undangan-edit3');
Route::post('/nama-undangan/design3/{id}/list', [NamaUndanganDesign3Controller::class, 'store'])->name('nama-undangan-store3');
Route::put('/nama-undangan/design3/{weddingDesign3Id}/{id}', [NamaUndanganDesign3Controller::class, 'update'])->name('nama-undangan-update3');
Route::delete('/nama-undangan/design3/{id}', [NamaUndanganDesign3Controller::class, 'destroy'])->name('nama-undangan.destroy3');



// Route undangan design 4
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/for=')->group(function () {
    Route::get('/preview', [HomeDesign4Controller::class, 'show'])->name('wedding-design4-home-preview');
});


Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/for={nama_undangan}', [HomeDesign4Controller::class, 'showDetail'])->name('wedding-design4-home');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/for={nama_undangan}', [HomeDesign4Controller::class, 'store'])->name('wedding-design4-post');

Route::resource('/nama-undangan', NamaUndanganDesign4Controller::class);
Route::get('nama-undangan/premium-gold/{weddingDesign4Id}/list', [NamaUndanganDesign4Controller::class, 'index'])->name('nama-undangan-list4');
Route::get('/nama-undangan/premium-gold/{id}/create', [NamaUndanganDesign4Controller::class, 'create'])->name('nama-undangan-create4');
Route::post('/nama-undangan/premium-gold/{id}/list', [NamaUndanganDesign4Controller::class, 'store'])->name('nama-undangan-store4');
Route::get('/nama-undangan/premium-gold/{id}/edit', [NamaUndanganDesign4Controller::class, 'edit'])->name('nama-undangan-edit4');
Route::put('/nama-undangan/premium-gold/{weddingDesign4Id}/{id}', [NamaUndanganDesign4Controller::class, 'update'])->name('nama-undangan-update4');
Route::delete('/nama-undangan/premium-gold/{id}', [NamaUndanganDesign4Controller::class, 'destroy'])->name('nama-undangan.destroy4');


// Route undangan design 5
Route::prefix('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/kepada=')->group(function () {
    Route::get('/preview', [HomeDesign5Controller::class, 'show'])->name('wedding-design5-home-preview');
});

Route::get('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/kepada={nama_undangan}', [HomeDesign5Controller::class, 'showDetail'])->name('wedding-design5-home');
Route::post('/{nama_mempelai_laki}&{nama_mempelai_perempuan}/kepada={nama_undangan}', [HomeDesign5Controller::class, 'store'])->name('wedding-design5-post');

Route::resource('/nama-undangan', NamaUndanganDesign5Controller::class);
Route::get('nama-undangan/premium-silver/{weddingDesign5Id}/list', [NamaUndanganDesign5Controller::class, 'index'])->name('nama-undangan-list5');
Route::get('/nama-undangan/premium-silver/{id}/create', [NamaUndanganDesign5Controller::class, 'create'])->name('nama-undangan-create5');
Route::post('/nama-undangan/premium-silver/{id}/list', [NamaUndanganDesign5Controller::class, 'store'])->name('nama-undangan-store5');
Route::get('/nama-undangan/premium-silver/{id}/edit', [NamaUndanganDesign5Controller::class, 'edit'])->name('nama-undangan-edit5');
Route::put('/nama-undangan/premium-silver/{weddingDesign5Id}/{id}', [NamaUndanganDesign5Controller::class, 'update'])->name('nama-undangan-update5');
Route::delete('/nama-undangan/premium-silver/{id}', [NamaUndanganDesign5Controller::class, 'destroy'])->name('nama-undangan.destroy5');



// User Route

Route::resource('/', LandingPageController::class);
Route::resource('/blog-list', UserBlogController::class);
// // Route::get('/blog-view/{judul}', [UserBlogController::class, 'show'])->name('blog-view.show');
Route::resource('/gambarin-list', UserGambarinController::class);
Route::resource('/seserahan-list', UserSeserahanController::class);
Route::resource('/cetakfoto-list', UserCetakFotoController::class);
Route::resource('/undangandigital-list', UserUndanganDigitalController::class);

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

Route::get('/wedding-4', function () {
    return view('wedding-design4.home-preview');
});

Route::get('/wedding-5', function () {
    return view('wedding-design5.home-preview');
});


Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Linkdes Succesfully';
});
