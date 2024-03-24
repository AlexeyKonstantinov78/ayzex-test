<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index'])->name('home');
//Route::get('/note', [NoteController::class, 'create'])->name('note.create');
Route::get('/note/{note}/edit',  [NoteController::class, 'edit'])->name('note.edit');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::put('/note/{note}',  [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{note}',  [NoteController::class, 'destroy'])->name('note.destroy');

Route::fallback(function (){
   return view('errors.404');
});
