<nav>
<div>
    <button><a href="{{route('accueil')}}">🏛 Accueil</a></button>
    <button><a href="{{route('presentation')}}">❔ A propos</a></button>
    <button><a href="{{route('contact')}}">☎️ Contact</a></button>
    @auth
        <button><a href="{{route('recettes.index')}}">📜 Recettes</a></button>
    @endauth
</div>

@guest
    <div>
        <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
    </div>
@endguest
@auth
    <div>
        {{Auth::user()->name}}
        <button><a href="#" id="logout">Logout</a>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            document.getElementById('logout-form').submit();
        });
    </script>
@endauth
</nav>
