@extends('admin.base')

@section('title', $animal->exists ? "Editer un animal" : "Créer un animal")

@section('content')

    <h1 class="text-xl">@yield('title')</h1>
    <form action="{{ route($animal->exists ? 'admin.animal.update' : 'admin.animal.store', $animal) }}" method="post">

        @csrf
        @method($animal->exists ? 'put' : 'post')

        <div class="flex flex-col gap-4 justify-center">
            @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $animal->name])
            @include('shared.input', ['type' => 'textarea' , 'name' => 'description', 'value' => $animal->description])
            @include('shared.input', ['type' => 'number', 'name' => 'age', 'value' => $animal->age])
            @include('shared.input', ['label' => 'Prix HT €', 'type' => 'number', 'name' => 'price', 'value' => $animal->price])
            @include('shared.enum', ['label' => 'Statut', 'datas' => $statuses , 'name' => 'status', 'value' => $animal->status])
            @include('shared.select', ['datas' => $types , 'label' => 'Type', 'name' => 'type_id', 'value' => $animal->type?->id])
            @include('shared.select', ['datas' => $breeds , 'label' => 'Race', 'name' => 'breed_id', 'value' => $animal->breed?->id])


        </div>

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
