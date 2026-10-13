<?php

use App\Http\Controllers\BencanaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('bencana.index');
});

Route::get('/bencana', [BencanaController::class, 'index'])->name('bencana.index');
Route::get('/bencana/tahun/{tahun}', [BencanaController::class, 'show'])->name('bencana.tahun');
Route::get('/bencana/tahun/{tahun}/create', [BencanaController::class, 'createForYear'])->name('bencana.create.year');
Route::resource('bencana', BencanaController::class)->except(['index', 'show']);
