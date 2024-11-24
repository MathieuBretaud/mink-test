<div class="navbar bg-base-300">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">Mink-test</a>
    </div>
    @php
        $route = request()->route()->getName();
    @endphp
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @guest
                <li>
                    <a href="{{ route('login') }}" @class(['nav-link', 'active' => str_contains($route, 'login')])>Connexion</a>
                </li>
            @endguest
            @auth
                @if(auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('admin.animal.index') }}" @class(['nav-link', 'active' => str_contains($route, 'admin')])>Administration</a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="nav-link">Se déconnecter</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>
