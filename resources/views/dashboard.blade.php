<html>
<x-app-layout :titre="$titre">

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
<div>
    <h2>BONJOUR DEPUIS LE DASHBOARD</h2>
</div>
</x-app-layout>
</html>
