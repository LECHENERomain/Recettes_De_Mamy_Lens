<x-app-layout :titre="$titre">
    <div>
        <h1>Edition d'une recette</h1>

        <form action="{{route('recettes.update', ['id'=>$recette->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div>
                <label for="nom">Nom de la recette : </label>
                <input type="text" name="nom" id="nom"/>
            </div>
            <div>
                <label for="description">Description de la recette : </label>
                <input type="text" name="description" id="description"/>
            </div>
            <div>
                <label for="categorie">Catégorie de la recette : </label>
                <select name="categorie" id="categorie">
                    <option value="entree">Entrée</option>
                    <option value="plat">Plat</option>
                    <option value="dessert">Dessert</option>
                </select>
            </div>
            <div>
                <label for="temps_preparation">Temps de préparation : </label>
                <input type="text" name="temps_preparation" id="temps_preparation"/>
            </div>
            <div>
                <label for="nb_personnes">Nombre de personnes : </label>
                <input type="text" name="nb_personnes" id="nb_personnes"/>
            </div>
            <div>
                <label for="cout">Coût : </label>
                <select name="cout" id="cout">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="visuel">Visuel : </label>
                <input type="file" name="visuel" id="visuel" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Modifier le visuel</button>
            <div>
                <input type="submit" value="Valider"/>
            </div>
        </form>
    </div>
</x-app-layout>

