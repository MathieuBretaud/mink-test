@extends('admin.base')

@section('title', $animal->exists ? "Editer un animal" : "Créer un animal")

@section('content')
    <div class="container mx-auto max-w-6xl px-4">

        <h1 class="text-xl mb-4">@yield('title')</h1>
        <form action="{{ route($animal->exists ? 'admin.animal.update' : 'admin.animal.store', $animal) }}"
              method="post" enctype="multipart/form-data">

            @csrf
            @method($animal->exists ? 'put' : 'post')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $animal->name])
                    @include('shared.input', ['type' => 'textarea' , 'name' => 'description', 'value' => $animal->description])
                    @include('shared.input', ['type' => 'number', 'name' => 'age', 'value' => $animal->age])
                    @include('shared.input', ['label' => 'Prix HT €', 'type' => 'number', 'name' => 'price', 'value' => $animal->price])
                    @include('shared.enum', ['label' => 'Statut', 'datas' => $statuses , 'name' => 'status', 'value' => $animal->status])
                    @include('shared.select', ['datas' => $types , 'label' => 'Type', 'name' => 'type_id', 'value' => $animal->type?->id])
                    @include('shared.select', ['datas' => $breeds , 'label' => 'Race', 'name' => 'breed_id', 'value' => $animal->breed?->id])

                    <div class="mt-2">
                        <button class="btn">
                            @if($animal->exists)
                                Modifier
                            @else
                                Créer
                            @endif

                        </button>
                    </div>
                </div>
                @if($animal->exists)
                    <div class="grid grid-cols-2 gap-4">
                        <input-picture :animal='@json($animal['id'])'></input-picture>
                    </div>
            </div>
            @endif
        </form>
    </div>

@endsection
