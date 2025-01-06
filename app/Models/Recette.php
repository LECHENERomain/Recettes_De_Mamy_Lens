<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'categorie', 'visuel', 'temps_preparation', 'nb_personnes', 'cout'];

    protected $casts = [
        'nom' => 'string',
        'description' => 'string',
        'categorie' => 'string',
        'visuel' => 'string',
        'temps_preparation' => 'integer',
        'nb_personnes' => 'integer',
        'cout' => 'integer',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredient(){
        return $this->belongsToMany(Ingredient::class, 'compose')
            ->as('composants')
            ->withPivot('quantite', 'observation');
    }
}
