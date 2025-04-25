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

Route::middleware(['auth.session'])->group(function () {
    Route::resource('MasterTutorial', MasterTutorialController::class);

    Route::resource('MasterTutorial.DetailTutorial', DetailTutorialController::class);
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

Route::get('/presentation/{slug}', [PresentationController::class, 'show'])->name('presentation.show');

Route::delete('tutorials/{DetailTutorial}/{MasterTutorial}', [DetailTutorialController::class, 'destroy'])
    ->name('MasterTutorial.DetailTutorial.destroy');