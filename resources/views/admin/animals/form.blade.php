@extends('admin.base')

@section('title', $animal->exists ? "Editer un animal" : "Créer un animal")

@section('content')

    <h1 class="text-xl">@yield('title')</h1>

    <form action="{{ route($animal->exists ? 'admin.animal.update' : 'admin.animal.store', $animal) }}" method="post">

        @csrf
        @method($animal ? 'put' : 'post')

        <div>
            <button class="btn">
                @if($animal->exists)
                    Modifier
                @else
                    Créer
                @endif

            </button>
        </div>

    </form>

@endsection
