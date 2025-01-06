<?php

namespace App\Repositories;

use App\Models\Recette;
use App\Repositories\IRecetteRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RecetteRepository implements IRecetteRepository
{

    public function all(string $cat): Collection
    {
        $query = Recette::query();
        if ($cat !== 'All') {
            $query = $query->where('categorie', $cat);
        }
        return $query->get();
    }

    public function find(int $id): Recette
    {
        return Recette::findOrFail($id);
    }

    public function create(array $data): Recette
    {
        array_key_exists('effectuee', $data) ? $data['effectuee'] = true : $data['effectuee'] = false;
        return Recette::create($data);
    }

    public function update(int $id, array $data): Recette
    {
        $recette = Recette::findOrFail($id);
        array_key_exists('effectuee', $data) ? $data['effectuee'] = true : $data['effectuee'] = false;
        $recette->update($data);
        return $recette;
    }

    public function delete(int $id): void
    {
        $recette = Recette::findOrFail($id);
        $recette->delete();

    }

    public function categories(): array
    {
        return Recette::distinct('categorie')->pluck('categorie')->toArray();
    }

    public function uploadImage(UploadedFile $file, int $id): Recette
    {
        $recette = Recette::findOrFail($id);

        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($recette->url_media) && $recette->url_media != "images/no-image.svg") {
            Storage::delete($recette->url_media);
        }
        $recette->url_media = 'images/' . $nom;
        $recette->save();
        return $recette;
    }
}
