<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

    protected $fillable = ['nom', 'nature', 'visuel'];

    protected $casts = [
        'nom' => 'string',
        'nature' => 'string',
        'visuel' => 'string',
    ];

    function recettes(){
        return $this->belongsToMany(Recette::class, 'compose')
            ->as('compose')
            ->withPivot('quantite', 'observation');
    }
}
