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
        <table>
            <tbody>
            <tr>
                <td>Nom</td>
                <td>{{$recette->nom}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$recette->description}}</td>
            </tr>
            <tr>
                <td>Catégorie</td>
                <td>{{$recette->categorie}}</td>
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
    </div>
</x-app-layout>
