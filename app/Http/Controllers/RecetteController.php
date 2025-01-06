<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Repositories\IRecetteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie as LaravelCookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecetteController extends Controller
{
    public function __construct(private IRecetteRepository $recetteRepository){

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $recettes = Recette::all();
                $cat = 'All';
                LaravelCookie::expire('cat');
            } else {
                $recettes = Recette::where('categorie', $value)->get();
                $cat = $value;
                LaravelCookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $recettes = Recette::all();
                LaravelCookie::expire('cat');
            } else {
                $recettes = Recette::where('categorie', $cat)->get();
                LaravelCookie::queue('cat', $cat, 10);
            }
        }
        $categories = Recette::distinct('categorie')->pluck('categorie');
        return view('recettes.index', ['titre' => "Liste des recettes", 'recettes' => $recettes, 'cat' => $cat, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recettes.create') -> with('titre', 'Création de recette');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recette = new Recette();
        $recette->nom = $request->input("nom");
        $recette->description = $request->input("description");
        $recette->categorie = $request->input("categorie");
        $recette->visuel = "image1.png";
        $recette->temps_preparation = $request->input("temps_preparation");
        $recette->nb_personnes = $request->input("nb_personnes");
        $recette->cout = $request->input("cout");
        $recette->save();
        return redirect()->route('recettes.index')->with('type', 'primary')->with('msg', 'Recette ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $recette = Recette::find($id);
        return view('recettes.show', ['recette' => $recette]) -> with('titre', 'Affichage de la recette');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recette = Recette::find($id);
        return view('recettes.edit', ['recette' => $recette]) -> with('titre', 'Modification de recette');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recette = Recette::find($id);
        $recette->nom = $request->input("nom");
        $recette->description = $request->input("description");
        $recette->categorie = $request->input("categorie");
        $recette->visuel = "image1.png";
        $recette->temps_preparation = $request->input("temps_preparation");
        $recette->nb_personnes = $request->input("nb_personnes");
        $recette->cout = $request->input("cout");
        $recette->save();
        return redirect()->route('recettes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recette = Recette::find($id);
        $recette->delete();
        return redirect()->route('recettes.index');
    }

    public function upload(Request $request, $id){
        $recette = Recette::findOrFail($id);
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('recettes.show', [$recette->id])
                ->with('type', 'primary')
                ->with('msg', 'Recette non modifiée ('. $msg . ')');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($recette->url_media)) {
            Log::info("Image supprimée : ". $recette->url_media);
            Storage::delete($recette->url_media);
        }
        $recette->url_media = 'images/'.$nom;
        $recette->save();
        //$file->store('docs');
        return redirect()->route('recettes.show', [$recette->id])
            ->with('type', 'primary')
            ->with('msg', 'Recette modifiée avec succès');
    }
}
