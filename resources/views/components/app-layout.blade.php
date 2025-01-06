<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$titre ?? "Les recettes de MamyLens"}}</title>
</head>
<body>

<x-menu></x-menu>

<main><main>
        @if(session('msg'))
            <x-message-info :type="session('type')" :message="session('msg')"></x-message-info>
        @endif
        {{$slot}}
    </main>
</main>

<aside>
    <x-aside></x-aside>
</aside>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
