<x-app-layout :titre="$titre">
    <style>
        table{
            border-collapse: collapse;
            border: 2px solid rgb(140 140 140);
            font-family: sans-serif;
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        td{
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
        }
    </style>
    <div>
        <h1>{{$titre}}</h1>
        <h2>La liste des recettes</h2>

        <h4>Filtrage par catégorie</h4>
        <form action="{{route('recettes.index')}}" method="get">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
                @foreach($categories as $categorie)
                    <option value="{{$categorie}}" @selected($cat == $categorie)>{{$categorie}}</option>
                @endforeach
            </select>
            <input type="submit" value="OK">
        </form>

        @if(!empty($recettes))
            <ul>
            @foreach($recettes as $recette)
                <table>
                    <tbody>
                        <tr>
                            <td>Nom</td>
                            <td>{{$recette->nom}}</td>
                            <td>
                                <a href="{{route('recettes.show', ['id'=>$recette->id])}}">Afficher la recette</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{$recette->description}}</td>
                            <td>
                                <a href="{{route('recettes.edit', ['id'=>$recette->id])}}">Modifier la recette</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Catégorie</td>
                            <td>{{$recette->categorie}}</td>
                            <td>
                                <form action="{{route('recettes.destroy', ['id'=>$recette->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer la recette</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Visuel</td>
                            <td>{{$recette->visuel}}</td>
                        </tr>
                        <tr>
                            <td>Temps de la préparation</td>
                            <td>{{$recette->temps_preparation}}</td>
                        </tr>
                        <tr>
                            <td>Nombre de personnes</td>
                            <td>{{$recette->nb_personnes}}</td>
                        </tr>
                        <tr>
                            <td>Coût</td>
                            <td>{{$recette->cout}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </ul>
        @else
            <h3>Aucune recette</h3>
            @endif
    </div>
</x-app-layout>
