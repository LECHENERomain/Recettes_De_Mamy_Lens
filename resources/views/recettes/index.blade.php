<x-app-layout :titre="$titre">
    <div>
        <h1>{{$titre}}</h1>
        <h2>La liste des recettes</h2>

        @if(!empty($recettes))
            <ul>
            @foreach($recettes as $recette)
                <li>{{$recette->nom}} : {{$recette->description}} Catégorie : {{$recette->categorie}}
                    {{$recette->visuel}} Temps estimé : {{$recette->temps_preparation}} Nombre de personnes : {{$recette->nb_personnes}} Cout : {{$recette->cout}}
                </li>
                @endforeach
            </ul>
        @else
            <h3>Aucune recette</h3>
            @endif
    </div>
</x-app-layout>
