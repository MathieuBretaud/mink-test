@extends('base')

@section('title', 'Connexion')

@section('content')

    <div class="flex flex-col justify-center items-center gap-4">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('login') }}" class="vstack gap-3">
            @csrf

            <x-forms.input type="email" name="email" label="Email"/>
            <x-forms.input type="password" name="password" label="Mot de passe"/>

            <div class="mt-4 text-center">
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>

@endsection
