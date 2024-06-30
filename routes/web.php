<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Landing\LandingPageController@home')->name('home');
Route::get('/sejarah', 'Landing\LandingPageController@sejarah')->name('sejarah');
Route::get('/visi-misi', 'Landing\LandingPageController@visiMisi')->name('visimisi');
Route::get('/struktur-pengurus', 'Landing\LandingPageController@strukturPengurus')->name('struktur');
Route::get('/kontak', 'Landing\LandingPageController@kontak')->name('kontak');
Route::group(['prefix' => 'berita'], function () {
    Route::get('/', 'Landing\LandingPageController@berita')->name('landingberita');
    Route::get('/kegiatan', 'Landing\LandingPageController@beritaKegiatan')->name('beritakegiatan');
    Route::get('/feature', 'Landing\LandingPageController@beritaFeature')->name('beritafeature');
    Route::get('/opini', 'Landing\LandingPageController@beritaOpini')->name('beritaopini');
    Route::get('/hot', 'Landing\LandingPageController@hotberita');
    Route::get('/mont', 'Landing\LandingPageController@mont');
});
Route::get('/detail-berita/{id}', 'Landing\LandingPageController@detailberita')->name('landingdetailberita');

Route::get('login', 'User\AuthUserController@login')->name('login');
Route::post('login', 'User\AuthUserController@getlogin');
Route::get('logout', 'User\AuthUserController@logout')->name('logout');
Route::get('/laporan-iuran/{id}', 'Admin\IuranController@report')->name('laporan');


Route::group(['prefix' => 'admin', 'middleware'=> ['level:admin', 'auth']], function () {
    Route::get('/dashboard', 'Admin\Dashboard\DashboardController@index')->name('dashboard');
    Route::get('/edit', 'Admin\Dashboard\DashboardController@edit');
    Route::post('/update', 'Admin\Dashboard\DashboardController@update');

    Route::group(['prefix' => 'master'], function () {
        // Anggota
        Route::group(['prefix' => 'anggota'], function () {
            Route::get('/', 'Admin\AnggotaController@index')->name('anggota');
            Route::get('/listpendiri', 'Admin\AnggotaController@listanggotapendiri');
            Route::get('/listkehormatan', 'Admin\AnggotaController@listanggotakehormatan');
            Route::get('/listpenuh', 'Admin\AnggotaController@listanggotapenuh');
            Route::get('/lististimewa', 'Admin\AnggotaController@listanggotaistimewa');
            Route::get('/listmuda', 'Admin\AnggotaController@listanggotamuda');
            Route::get('/detail', 'Admin\AnggotaController@detailanggota');
            Route::get('/formanggota', 'Admin\AnggotaController@formanggota');
            Route::post('/simpan', 'Admin\AnggotaController@simpan');
            Route::get('/edit', 'Admin\AnggotaController@edituser');
            Route::post('/update', 'Admin\AnggotaController@update');
            Route::delete('/delete', 'Admin\AnggotaController@delete');
            Route::post('/resetpassword', 'Admin\AnggotaController@resetPasssword');
        });
        // perlengkapan
        Route::group(['prefix' => 'perlengkapan'], function () {
            Route::get('/', 'Admin\PerlengkapanController@index')->name('perlengkapan');
            Route::get('/listperlengkapan', 'Admin\PerlengkapanController@listperlengkapan');
            Route::get('/detail', 'Admin\PerlengkapanController@loadgambar');
            Route::get('/formperlengkapan', 'Admin\PerlengkapanController@formperlengkapan');
            Route::post('/simpan', 'Admin\PerlengkapanController@simpan');
            Route::get('/edit', 'Admin\PerlengkapanController@edit');
            Route::post('/update', 'Admin\PerlengkapanController@update');
            Route::delete('/delete', 'Admin\PerlengkapanController@delete');
        });
        // iuran
        Route::group(['prefix' => 'iuran'], function () {
            Route::get('/', 'Admin\IuranController@index')->name('iuran');
            // Route::get('/listiuran', 'Admin\IuranController@listiuran');
            Route::get('/form', 'Admin\IuranController@form');
            Route::post('/simpan', 'Admin\IuranController@simpan');
            Route::get('/detail-iuran/{id}', 'Admin\IuranController@detail')->name('detail');
            Route::get('/detail-iuran-user', 'Admin\IuranController@detailIuranUser');
            Route::get('/form-iuran-user', 'Admin\IuranController@formiuranuser');
            Route::post('/bayar', 'Admin\IuranController@bayarIuran');
            Route::delete('/deleteiuranuser', 'Admin\IuranController@deleteIuranUser');
            Route::delete('/deleteruleiuran', 'Admin\IuranController@deleteRuleIuran');
        });
    });

    Route::group(['prefix' => 'landing'], function () {
        Route::group(['prefix' => 'beranda'], function () {
            Route::get('/', 'Admin\ContentManagerController@beranda')->name('beranda');
            Route::get('/list-divisi', 'Admin\ContentManagerController@listDivisi');
            Route::get('/edit/{id}', 'Admin\ContentManagerController@editDivisi')->name('editDivisi');
            Route::put('/update', 'Admin\ContentManagerController@updateDivisi');
        });
        Route::group(['prefix' => 'struktur'], function () {
            Route::get('/', 'Admin\ContentManagerController@struktur')->name('strukturimage');
            Route::post('/upload', 'Admin\ContentManagerController@uploadStruktur');
            Route::get('/image', 'Admin\ContentManagerController@image');
        });
        Route::group(['prefix' => 'berita'], function () {
            Route::get('/', 'Admin\ContentManagerController@berita')->name('berita');
            Route::get('/create', 'Admin\ContentManagerController@createBerita')->name('createberita');
            Route::post('/store', 'Admin\ContentManagerController@storeBerita');
            Route::get('/list', 'Admin\ContentManagerController@listBerita');
            Route::get('/edit/{id}', 'Admin\ContentManagerController@editBerita')->name('editberita');
            Route::post('/update', 'Admin\ContentManagerController@updateBerita')->name('updateberita');
            Route::delete('/delete', 'Admin\ContentManagerController@deleteBerita');
        });
        Route::group(['prefix' => 'ketua'], function () {
            Route::get('/', 'Admin\ContentManagerController@ketua')->name('ketua');
            Route::get('/formketua', 'Admin\ContentManagerController@formketua');
            Route::post('/simpan', 'Admin\ContentManagerController@storeKetua');
            Route::delete('/delete', 'Admin\ContentManagerController@deleteKetua');
        });
        Route::group(['prefix' => 'visimisi'], function () {
            Route::get('/', 'Admin\ContentManagerController@visimisi')->name('Evisimisi');
            Route::get('/form', 'Admin\ContentManagerController@createVisiMisi')->name('form');
            Route::post('/store', 'Admin\ContentManagerController@storeVisimisi');
            Route::get('/edit', 'Admin\ContentManagerController@editVisiMisi');
            Route::post('/update', 'Admin\ContentManagerController@updateVisimisi');
            Route::delete('/delete', 'Admin\ContentManagerController@deleteVisiMisi');
        });
    });

});

Route::group(['prefix' => 'anggota', 'middleware'=> ['level:anggota', 'auth']], function () {
    Route::get('/dashboard', 'Anggota\DashboardController@index')->name('dashboardanggota');
    Route::get('/daftar-anggota', 'Anggota\AnggotaController@index')->name('daftaranggota');
    Route::get('/detail/{id}', 'Anggota\AnggotaController@detail')->name('detailuser');
    Route::get('/daftar-perlengkapan', 'Anggota\AnggotaController@perlengkapan')->name('daftarperlengkapan');
    Route::get('/detail-perlengkapan', 'Anggota\AnggotaController@detailPerlengkapan')->name('detailperlengkapan');
    Route::get('/edit-profil/{id}', 'Anggota\AnggotaController@editProfil')->name('editprofil');
    Route::post('/update-profil', 'Anggota\AnggotaController@updateProfil')->name('updateprofil');
    Route::post('/update-photo', 'Anggota\AnggotaController@updateFoto')->name('updatefoto');
    Route::post('/update-password', 'Anggota\AnggotaController@updatePassword')->name('updatepassword');
    Route::get('/viewfoto', 'Anggota\AnggotaController@viewfoto');
});





