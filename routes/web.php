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
use App\Http\Controllers\HomeDesign6Controller;
use App\Http\Controllers\HomeDesign7Controller;
use App\Http\Controllers\HomeDesign8Controller;
use App\Http\Controllers\HomeDesign9Controller;
use App\Http\Controllers\IndexDesign1Controller;
use App\Http\Controllers\IndexDesign2Controller;
use App\Http\Controllers\IndexDesign3Controller;
use App\Http\Controllers\InformasiDesign4Controller;
use App\Http\Controllers\InformasiDesign5Controller;
use App\Http\Controllers\InformasiDesign6Controller;
use App\Http\Controllers\InformasiDesign7Controller;
use App\Http\Controllers\InformasiDesign8Controller;
use App\Http\Controllers\InformasiDesign9Controller;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NamaUndanganDesign1Controller;
use App\Http\Controllers\NamaUndanganDesign2Controller;
use App\Http\Controllers\NamaUndanganDesign3Controller;
use App\Http\Controllers\NamaUndanganDesign4Controller;
use App\Http\Controllers\NamaUndanganDesign5Controller;
use App\Http\Controllers\NamaUndanganDesign6Controller;
use App\Http\Controllers\NamaUndanganDesign7Controller;
use App\Http\Controllers\NamaUndanganDesign8Controller;
use App\Http\Controllers\NamaUndanganDesign9Controller;
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
use App\Http\Controllers\WeddingDesign6Controller;
use App\Http\Controllers\WeddingDesign7Controlller;
use App\Http\Controllers\WeddingDesign8Controller;
use App\Http\Controllers\WeddingDesign9Controller;
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
    Route::delete('/wedding-design4/{id}/delete-perjalanan-cinta', [WeddingDesign4Controller::class, 'destroyPerjalananCinta'])->name('perjalanancinta-design4.destroy');

    // Routes for Direct Transfer4
    Route::post('/wedding-design4/{id}/store-direct-transfer', [WeddingDesign4Controller::class, 'storeDirectTransfer'])->name('directtransfer-design4.store');
    Route::put('/wedding-design4/{id}/update-direct-transfer', [WeddingDesign4Controller::class, 'updateDirectTransfer'])->name('directtransfer-design4.update');
    Route::delete('/wedding-design4/{id}/delete-direct-transfer', [WeddingDesign4Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design4.destroy');

    // Routes for Kirim Hadiah5
    Route::post('/wedding-design4/{id}/store-kirim-hadiah', [WeddingDesign4Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design4.store');
    Route::put('/wedding-design4/{id}/update-kirim-hadiah', [WeddingDesign4Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design4.update');
    Route::delete('/wedding-design4/{id}/delete-kirim-hadiah', [WeddingDesign4Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design4.destroy');


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
    Route::delete('/wedding-design5/{id}/delete-perjalanan-cinta', [WeddingDesign5Controller::class, 'destroyPerjalananCinta'])->name('perjalanancinta-design5.destroy');

    // Routes for Direct Transfer5
    Route::post('/wedding-design5/{id}/store-direct-transfer', [WeddingDesign5Controller::class, 'storeDirectTransfer'])->name('directtransfer-design5.store');
    Route::put('/wedding-design5/{id}/update-direct-transfer', [WeddingDesign5Controller::class, 'updateDirectTransfer'])->name('directtransfer-design5.update');
    Route::delete('/wedding-design5/{id}/delete-direct-transfer', [WeddingDesign5Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design5.destroy');

    // Routes for Kirim Hadiah5
    Route::post('/wedding-design5/{id}/store-kirim-hadiah', [WeddingDesign5Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design5.store');
    Route::put('/wedding-design5/{id}/update-kirim-hadiah', [WeddingDesign5Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design5.update');
    Route::delete('/wedding-design5/{id}/delete-kirim-hadiah', [WeddingDesign5Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design5.destroy');
    Route::delete('/wedding-design5/{id}/{type}/delete', [WeddingDesign5Controller::class, 'destroy'])->name('design5.destroy');

    // Routes for InformasiDesign6
    Route::resource('/wedding-design6', InformasiDesign6Controller::class);
    Route::get('/wedding-design6/{wedding_design6}', [WeddingDesign6Controller::class, 'show'])->name('wedding-design6.show');
    Route::post('/wedding-design6/{id}/update', [InformasiDesign6Controller::class, 'update']);

    // Routes for WeddingDesign6
    Route::get('/wedding-design6/{id}/create', [WeddingDesign6Controller::class, 'create'])->name('form-design6.create');
    Route::post('/wedding-design6/{id}/store', [WeddingDesign6Controller::class, 'store'])->name('form-design6.store');
    Route::get('/wedding-design6/{informasiDesign6Id}/edit/{id}', [WeddingDesign6Controller::class, 'edit'])->name('form-design6.edit');
    Route::put('/wedding-design6/{informasiDesign6Id}/update/{id}', [WeddingDesign6Controller::class, 'update'])->name('form-design6.update');
    Route::delete('/wedding-design6/{id}', [WeddingDesign6Controller::class, 'destroy'])->name('form-design6.destroy');

    // Routes for Direct Transfer6
    Route::post('/wedding-design6/{id}/store-direct-transfer', [WeddingDesign6Controller::class, 'storeDirectTransfer'])->name('directtransfer-design6.store');
    Route::put('/wedding-design6/{id}/update-direct-transfer', [WeddingDesign6Controller::class, 'updateDirectTransfer'])->name('directtransfer-design6.update');
    Route::delete('/wedding-design6/{id}/delete-direct-transfer', [WeddingDesign6Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design6.destroy');

    // Routes for Kirim Hadiah6 
    Route::post('/wedding-design6/{id}/store-kirim-hadiah', [WeddingDesign6Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design6.store');
    Route::put('/wedding-design6/{id}/update-kirim-hadiah', [WeddingDesign6Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design6.update');
    Route::delete('/wedding-design6/{id}/delete-kirim-hadiah', [WeddingDesign6Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design6.destroy');

    // Routes for InformasiDesign7
    Route::resource('/wedding-design7', InformasiDesign7Controller::class);
    Route::get('/wedding-design7/{wedding_design7}', [WeddingDesign7Controlller::class, 'show'])->name('wedding-design7.show');
    Route::post('/wedding-design7/{id}/update', [InformasiDesign7Controller::class, 'update']);

    // Routes for WeddingDesign7
    Route::get('/wedding-design7/{id}/create', [WeddingDesign7Controlller::class, 'create'])->name('form-design7.create');
    Route::post('/wedding-design7/{id}/store', [WeddingDesign7Controlller::class, 'store'])->name('form-design7.store');
    Route::get('/wedding-design7/{informasiDesign7Id}/edit/{id}', [WeddingDesign7Controlller::class, 'edit'])->name('form-design7.edit');
    Route::put('/wedding-design7/{informasiDesign7Id}/update/{id}', [WeddingDesign7Controlller::class, 'update'])->name('form-design7.update');
    Route::delete('/wedding-design7/{id}', [WeddingDesign7Controlller::class, 'destroy'])->name('form-design7.destroy');

    // Routes for Direct Transfer7
    Route::post('/wedding-design7/{id}/store-direct-transfer', [WeddingDesign7Controlller::class, 'storeDirectTransfer'])->name('directtransfer-design7.store');
    Route::put('/wedding-design7/{id}/update-direct-transfer', [WeddingDesign7Controlller::class, 'updateDirectTransfer'])->name('directtransfer-design7.update');
    Route::delete('/wedding-design7/{id}/delete-direct-transfer', [WeddingDesign7Controlller::class, 'destroyDirectTransfer'])->name('directtransfer-design7.destroy');

    // Routes for Kirim Hadiah7
    Route::post('/wedding-design7/{id}/store-kirim-hadiah', [WeddingDesign7Controlller::class, 'storeKirimHadiah'])->name('kirimhadiah-design7.store');
    Route::put('/wedding-design7/{id}/update-kirim-hadiah', [WeddingDesign7Controlller::class, 'updateKirimHadiah'])->name('kirimhadiah-design7.update');
    Route::delete('/wedding-design7/{id}/delete-kirim-hadiah', [WeddingDesign7Controlller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design7.destroy');


    // Routes for InformasiDesign8
    Route::resource('/wedding-design8', InformasiDesign8Controller::class);
    Route::get('/wedding-design8/{wedding_design8}', [WeddingDesign8Controller::class, 'show'])->name('wedding-design8.show');
    Route::post('/wedding-design8/{id}/update', [InformasiDesign8Controller::class, 'update']);

    // Routes for WeddingDesign8
    Route::get('/wedding-design8/{id}/create', [WeddingDesign8Controller::class, 'create'])->name('form-design8.create');
    Route::post('/wedding-design8/{id}/store', [WeddingDesign8Controller::class, 'store'])->name('form-design8.store');
    Route::get('/wedding-design8/{informasiDesign8Id}/edit/{id}', [WeddingDesign8Controller::class, 'edit'])->name('form-design8.edit');
    Route::put('/wedding-design8/{informasiDesign8Id}/update/{id}', [WeddingDesign8Controller::class, 'update'])->name('form-design8.update');
    Route::delete('/wedding-design8/{id}', [WeddingDesign8Controller::class, 'destroy'])->name('form-design8.destroy');

    // Routes for Direct Transfer8
    Route::post('/wedding-design8/{id}/store-direct-transfer', [WeddingDesign8Controller::class, 'storeDirectTransfer'])->name('directtransfer-design8.store');
    Route::put('/wedding-design8/{id}/update-direct-transfer', [WeddingDesign8Controller::class, 'updateDirectTransfer'])->name('directtransfer-design8.update');
    Route::delete('/wedding-design8/{id}/delete-direct-transfer', [WeddingDesign8Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design8.destroy');

    // Routes for Kirim Hadiah8
    Route::post('/wedding-design8/{id}/store-kirim-hadiah', [WeddingDesign8Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design8.store');
    Route::put('/wedding-design8/{id}/update-kirim-hadiah', [WeddingDesign8Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design8.update');
    Route::delete('/wedding-design8/{id}/delete-kirim-hadiah', [WeddingDesign8Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design8.destroy');


    // Routes for InformasiDesign9
    Route::resource('/wedding-design9', InformasiDesign9Controller::class);
    Route::get('/wedding-design9/{wedding_design9}', [WeddingDesign9Controller::class, 'show'])->name('wedding-design9.show');
    Route::post('/wedding-design9/{id}/update', [InformasiDesign9Controller::class, 'update']);

    // // Routes for WeddingDesign9
    Route::get('/wedding-design9/{id}/create', [WeddingDesign9Controller::class, 'create'])->name('form-design9.create');
    Route::post('/wedding-design9/{id}/store', [WeddingDesign9Controller::class, 'store'])->name('form-design9.store');
    Route::get('/wedding-design9/{informasiDesign9Id}/edit/{id}', [WeddingDesign9Controller::class, 'edit'])->name('form-design9.edit');
    Route::put('/wedding-design9/{informasiDesign9Id}/update/{id}', [WeddingDesign9Controller::class, 'update'])->name('form-design9.update');
    Route::delete('/wedding-design9/{id}', [WeddingDesign9Controller::class, 'destroy'])->name('form-design9.destroy');

    // Routes for Direct Transfer9
    Route::post('/wedding-design9/{id}/store-direct-transfer', [WeddingDesign9Controller::class, 'storeDirectTransfer'])->name('directtransfer-design9.store');
    Route::put('/wedding-design9/{id}/update-direct-transfer', [WeddingDesign9Controller::class, 'updateDirectTransfer'])->name('directtransfer-design9.update');
    Route::delete('/wedding-design9/{id}/delete-direct-transfer', [WeddingDesign9Controller::class, 'destroyDirectTransfer'])->name('directtransfer-design9.destroy');

    // Routes for Kirim Hadiah9
    Route::post('/wedding-design9/{id}/store-kirim-hadiah', [WeddingDesign9Controller::class, 'storeKirimHadiah'])->name('kirimhadiah-design9.store');
    Route::put('/wedding-design9/{id}/update-kirim-hadiah', [WeddingDesign9Controller::class, 'updateKirimHadiah'])->name('kirimhadiah-design9.update');
    Route::delete('/wedding-design9/{id}/delete-kirim-hadiah', [WeddingDesign9Controller::class, 'destroyKirimHadiah'])->name('kirimhadiah-design9.destroy');

    // Routes for Blog
    Route::resource('/blog', BlogController::class);
    Route::post('/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');


    // Routes for Promo
    Route::resource('/promo', PromoController::class);

    // Routes for Gambarin
    Route::resource('/gambarin', GambarinController::class);

    // Routes for Seserahan
    Route::resource('/seserahan', SeserahanController::class);

    // Routes for Cetak Foto
    Route::resource('/cetakfoto', CetakFotoController::class);

    // Routes for Undangan Digital
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
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/for=')->group(function () {
    Route::get('/preview', [HomeDesign4Controller::class, 'show'])->name('wedding-design4-home-preview');
});


Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/for={slug_nama_undangan}', [HomeDesign4Controller::class, 'showDetail'])->name('wedding-design4-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/for={slug_nama_undangan}', [HomeDesign4Controller::class, 'store'])->name('wedding-design4-post');

Route::resource('/nama-undangan', NamaUndanganDesign4Controller::class);
Route::get('nama-undangan/premium-gold/{weddingDesign4Id}/list', [NamaUndanganDesign4Controller::class, 'index'])->name('nama-undangan-list4');
Route::get('/nama-undangan/premium-gold/{id}/create', [NamaUndanganDesign4Controller::class, 'create'])->name('nama-undangan-create4');
Route::post('/nama-undangan/premium-gold/{id}/list', [NamaUndanganDesign4Controller::class, 'store'])->name('nama-undangan-store4');
Route::get('/nama-undangan/premium-gold/{id}/edit', [NamaUndanganDesign4Controller::class, 'edit'])->name('nama-undangan-edit4');
Route::put('/nama-undangan/premium-gold/{weddingDesign4Id}/{id}', [NamaUndanganDesign4Controller::class, 'update'])->name('nama-undangan-update4');
Route::delete('/nama-undangan/premium-gold/{id}', [NamaUndanganDesign4Controller::class, 'destroy'])->name('nama-undangan.destroy4');


// Route undangan design 5
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/kepada=')->group(function () {
    Route::get('/preview', [HomeDesign5Controller::class, 'show'])->name('wedding-design5-home-preview');
});

Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/kepada={slug_nama_undangan}', [HomeDesign5Controller::class, 'showDetail'])->name('wedding-design5-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/kepada={slug_nama_undangan}', [HomeDesign5Controller::class, 'store'])->name('wedding-design5-post');

Route::resource('/nama-undangan', NamaUndanganDesign5Controller::class);
Route::get('nama-undangan/premium-silver/{weddingDesign5Id}/list', [NamaUndanganDesign5Controller::class, 'index'])->name('nama-undangan-list5');
Route::get('/nama-undangan/premium-silver/{id}/create', [NamaUndanganDesign5Controller::class, 'create'])->name('nama-undangan-create5');
Route::post('/nama-undangan/premium-silver/{id}/list', [NamaUndanganDesign5Controller::class, 'store'])->name('nama-undangan-store5');
Route::get('/nama-undangan/premium-silver/{id}/edit', [NamaUndanganDesign5Controller::class, 'edit'])->name('nama-undangan-edit5');
Route::put('/nama-undangan/premium-silver/{weddingDesign5Id}/{id}', [NamaUndanganDesign5Controller::class, 'update'])->name('nama-undangan-update5');
Route::delete('/nama-undangan/premium-silver/{id}', [NamaUndanganDesign5Controller::class, 'destroy'])->name('nama-undangan.destroy5');


// Route undangan design 6
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/teruntuk=')->group(function () {
    Route::get('/preview', [HomeDesign6Controller::class, 'show'])->name('wedding-design6-home-preview');
});

Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/teruntuk={slug_nama_undangan}', [HomeDesign6Controller::class, 'showDetail'])->name('wedding-design6-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/teruntuk={slug_nama_undangan}', [HomeDesign6Controller::class, 'store'])->name('wedding-design6-post');

Route::resource('/nama-undangan', NamaUndanganDesign6Controller::class);
Route::get('nama-undangan/platinum-silver/{weddingDesign6Id}/list', [NamaUndanganDesign6Controller::class, 'index'])->name('nama-undangan-list6');
Route::get('/nama-undangan/platinum-silver/{id}/create', [NamaUndanganDesign6Controller::class, 'create'])->name('nama-undangan-create6');
Route::post('/nama-undangan/platinum-silver/{id}/list', [NamaUndanganDesign6Controller::class, 'store'])->name('nama-undangan-store6');
Route::get('/nama-undangan/platinum-silver/{id}/edit', [NamaUndanganDesign6Controller::class, 'edit'])->name('nama-undangan-edit6');
Route::put('/nama-undangan/platinum-silver/{weddingDesign6Id}/{id}', [NamaUndanganDesign6Controller::class, 'update'])->name('nama-undangan-update6');
Route::delete('/nama-undangan/platinum-silver/{id}', [NamaUndanganDesign6Controller::class, 'destroy'])->name('nama-undangan.destroy6');


// Route undangan design 7
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/tertuju=')->group(function () {
    Route::get('/preview', [HomeDesign7Controller::class, 'show'])->name('wedding-design7-home-preview');
});

Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/tertuju={slug_nama_undangan}', [HomeDesign7Controller::class, 'showDetail'])->name('wedding-design7-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/tertuju={slug_nama_undangan}', [HomeDesign7Controller::class, 'store'])->name('wedding-design7-post');

Route::resource('/nama-undangan', NamaUndanganDesign7Controller::class);
Route::get('nama-undangan/platinum-gold/{weddingDesign7Id}/list', [NamaUndanganDesign7Controller::class, 'index'])->name('nama-undangan-list7');
Route::get('/nama-undangan/platinum-gold/{id}/create', [NamaUndanganDesign7Controller::class, 'create'])->name('nama-undangan-create7');
Route::post('/nama-undangan/platinum-gold/{id}/list', [NamaUndanganDesign7Controller::class, 'store'])->name('nama-undangan-store7');
Route::get('/nama-undangan/platinum-gold/{id}/edit', [NamaUndanganDesign7Controller::class, 'edit'])->name('nama-undangan-edit7');
Route::put('/nama-undangan/platinum-gold/{weddingDesign7Id}/{id}', [NamaUndanganDesign7Controller::class, 'update'])->name('nama-undangan-update7');
Route::delete('/nama-undangan/platinum-gold/{id}', [NamaUndanganDesign7Controller::class, 'destroy'])->name('nama-undangan.destroy7');


// Route undangan design 8
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/untukmu=')->group(function () {
    Route::get('/preview', [HomeDesign8Controller::class, 'show'])->name('wedding-design8-home-preview');
});

Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/untukmu={slug_nama_undangan}', [HomeDesign8Controller::class, 'showDetail'])->name('wedding-design8-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/untukmu={slug_nama_undangan}', [HomeDesign8Controller::class, 'store'])->name('wedding-design8-post');

Route::resource('/nama-undangan', NamaUndanganDesign8Controller::class);
Route::get('nama-undangan/premium-green/{weddingDesign8Id}/list', [NamaUndanganDesign8Controller::class, 'index'])->name('nama-undangan-list8');
Route::get('/nama-undangan/premium-green/{id}/create', [NamaUndanganDesign8Controller::class, 'create'])->name('nama-undangan-create8');
Route::post('/nama-undangan/premium-green/{id}/list', [NamaUndanganDesign8Controller::class, 'store'])->name('nama-undangan-store8');
Route::get('/nama-undangan/premium-green/{id}/edit', [NamaUndanganDesign8Controller::class, 'edit'])->name('nama-undangan-edit8');
Route::put('/nama-undangan/premium-green/{weddingDesign8Id}/{id}', [NamaUndanganDesign8Controller::class, 'update'])->name('nama-undangan-update8');
Route::delete('/nama-undangan/premium-green/{id}', [NamaUndanganDesign8Controller::class, 'destroy'])->name('nama-undangan.destroy8');


// Route undangan design 9
Route::prefix('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/bagi=')->group(function () {
    Route::get('/preview', [HomeDesign9Controller::class, 'show'])->name('wedding-design9-home-preview');
});

Route::get('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/bagi={slug_nama_undangan}', [HomeDesign9Controller::class, 'showDetail'])->name('wedding-design9-home');
Route::post('/{slug_nama_mempelai_laki}&{slug_nama_mempelai_perempuan}/bagi={slug_nama_undangan}', [HomeDesign9Controller::class, 'store'])->name('wedding-design9-post');

Route::resource('/nama-undangan', NamaUndanganDesign9Controller::class);
Route::get('nama-undangan/premium-flower/{weddingDesign9Id}/list', action: [NamaUndanganDesign9Controller::class, 'index'])->name('nama-undangan-list9');
Route::get('/nama-undangan/premium-flower/{id}/create', [NamaUndanganDesign9Controller::class, 'create'])->name('nama-undangan-create9');
Route::post('/nama-undangan/premium-flower/{id}/list', [NamaUndanganDesign9Controller::class, 'store'])->name('nama-undangan-store9');
Route::get('/nama-undangan/premium-flower/{id}/edit', [NamaUndanganDesign9Controller::class, 'edit'])->name('nama-undangan-edit9');
Route::put('/nama-undangan/premium-flower/{weddingDesign9Id}/{id}', [NamaUndanganDesign9Controller::class, 'update'])->name('nama-undangan-update9');
Route::delete('/nama-undangan/premium-flower/{id}', [NamaUndanganDesign9Controller::class, 'destroy'])->name('nama-undangan.destroy9');


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

Route::get('/wedding-6', function () {
    return view('wedding-design6.home-preview');
});

Route::get('/wedding-7', function () {
    return view('wedding-design7.home-preview');
});

Route::get('/wedding-8', function () {
    return view('wedding-design8.home-preview');
});

Route::get('/wedding-9', function () {
    return view('wedding-design9.home-preview');
});


Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Linkdes Succesfully';
});
