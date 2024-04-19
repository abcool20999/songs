<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    'awards',
    [AwardController::class, 'index']
)->name('awards.index');

Route::get(
    'awards/{id}',
    [AwardController::class, 'show']
)->name('awards.show');

Route::get(
    'songs/trash/{id}',
    [SongController::class, 'trash']
)->name('songs.trash')->middleware(['auth', 'verified']);

Route::get(
    'songs/trashed/',
    [SongController::class, 'trashed']
)->name('songs.trashed')->middleware(['auth', 'verified']);

Route::get(
    'songs/restore/{id}',
    [SongController::class, 'trash']
)->name('songs.restore')->middleware(['auth', 'verified']);



Route::resource('songs', SongController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
