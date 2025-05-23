<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterTutorialController;
use App\Http\Controllers\DetailTutorialController;
use App\Http\Controllers\PresentationController;

// Route::get('/', function() {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route::middleware(['auth.session'])->group(function () {
//     Route::resource('MasterTutorial', MasterTutorialController::class);
// });

// routes/web.php

Route::middleware(['auth.session'])->group(function () {
    Route::resource('MasterTutorial', MasterTutorialController::class);
    Route::resource('MasterTutorial.DetailTutorial', DetailTutorialController::class);

    // Rute untuk mengedit dan memperbarui detail tutorial
    Route::get('MasterTutorial/{MasterTutorial}/DetailTutorial/{DetailTutorial}/edit', [DetailTutorialController::class, 'edit'])->name('MasterTutorial.DetailTutorial.edit');
    Route::put('MasterTutorial/{MasterTutorial}/DetailTutorial/{DetailTutorial}', [DetailTutorialController::class, 'update'])->name('MasterTutorial.DetailTutorial.update');
});


// HTTP         Verb	            URI	Aksi	Deskripsi
// GET	        /posts	            index	    Menampilkan daftar semua post
// GET	        /posts/create	    create	    Menampilkan form untuk membuat post baru
// POST	        /posts	            store	    Menyimpan data post baru ke database
// GET	        /posts/{id}	        show	    Menampilkan detail satu post berdasarkan ID
// GET	        /posts/{id}/edit	edit	    Menampilkan form edit untuk post tertentu
// PUT/PATCH	/posts/{id}	        update	    Memperbarui post yang ada
// DELETE	    /posts/{id}	        destroy	    Menghapus post berdasarkan ID

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('tutorials/{DetailTutorial}/{MasterTutorial}', [DetailTutorialController::class, 'destroy'])
    ->name('MasterTutorial.DetailTutorial.destroy');

Route::get('/presentation/{slug}', [PresentationController::class, 'show'])->name('presentation.show');

Route::get('/finished/{slug}', [PresentationController::class, 'finished'])->name('presentation.finished');
Route::get('/finished/download/{slug}', [PresentationController::class, 'downloadPdf'])->name('presentation.downloadPdf');

Route::get('/api/tutorials/{kode_matkul}', [\App\Http\Controllers\TutorialApiController::class, 'listByCourse']);
