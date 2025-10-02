<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notes/export-pdf', [NoteController::class, 'exportPdf'])->name('notes.export.pdf');
Route::get('/notes/export-excel', [NoteController::class, 'exportExcel'])->name('notes.export.excel');
Route::get('/notes/with-images', [NoteController::class, 'withImages'])->name('notes.with-images');
    
    // Routes pour les notes (protegees par auth)
    Route::resource('notes', NoteController::class);
});



require __DIR__.'/auth.php';