<?php

use App\Http\Controllers\RecetteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('statiques.index', ['titre' => 'Accueil']);
})->name('accueil');

Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');

Route::get('/presentation', function (){
    return view('statiques.presentation', ['titre' => 'Presentation']);
})->name('presentation');

Route::get('/contact', function (){
    return view('statiques.contact', ['titre' => 'Contact']);
})->name('contact');

Route::prefix('/recettes')->group(function () {
    Route::get('/', [RecetteController::class, 'index'])->name('recettes.index');

    Route::get('/create', [RecetteController::class, 'create'])->name('recettes.create');

    Route::post('/', [RecetteController::class, 'store'])->name('recettes.store');

    Route::get('/edit/{id}', [RecetteController::class, 'edit'])->name('recettes.edit');

    Route::put('/{id}', [RecetteController::class, 'update'])->name('recettes.update');

    Route::get('/{id}', [RecetteController::class, 'show'])->name('recettes.show');

    Route::delete('/{id}', [RecetteController::class, 'destroy'])->name('recettes.destroy');

    Route::post('/{id}/update', [RecetteController::class, 'update'])->name('recettes.update');
});

Route::get('/home', function () {
    return view('dashboard', ['titre'=> 'Dashboard']);
})->middleware(['auth'])->name('home');
