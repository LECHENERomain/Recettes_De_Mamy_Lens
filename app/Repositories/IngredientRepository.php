<?php

namespace App\Repositories;

use App\Models\Ingredient;
use App\Repositories\IIngredientRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class IngredientRepository implements IIngredientRepository
{

    public function all(string $cat): Collection
    {
        $query = Ingredient::query();
        if ($cat !== 'All') {
            $query = $query->where('categorie', $cat);
        }
        return $query->get();
    }

    public function find(int $id): Ingredient
    {
        return Ingredient::findOrFail($id);
    }

    public function create(array $data): Ingredient
    {
        array_key_exists('effectuee', $data) ? $data['effectuee'] = true : $data['effectuee'] = false;
        return Ingredient::create($data);
    }

    public function update(int $id, array $data): Ingredient
    {
        $ingredient = Ingredient::findOrFail($id);
        array_key_exists('effectuee', $data) ? $data['effectuee'] = true : $data['effectuee'] = false;
        $ingredient->update($data);
        return $ingredient;
    }

    public function delete(int $id): void
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
    }

    public function categories(): array
    {
        return Ingredient::distinct('categorie')->pluck('categorie')->toArray();

    }

    public function uploadImage(UploadedFile $file, int $id): Ingredient
    {
        $ingredient = Ingredient::findOrFail($id);

        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($ingredient->url_media) && $ingredient->url_media != "images/no-image.svg") {
            Storage::delete($ingredient->url_media);
        }
        $ingredient->url_media = 'images/' . $nom;
        $ingredient->save();
        return $ingredient;
    }
}
