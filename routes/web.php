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

