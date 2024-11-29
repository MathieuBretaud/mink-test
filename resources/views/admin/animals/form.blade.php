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
                    <x-forms.input name="name" label="Nom" :value="$animal->name"/>
                    <x-forms.input type="textarea" name="description" :value="$animal->description"/>
                    <x-forms.input type="number" name="age" :value="$animal->age"/>
                    <x-forms.input type="number" name="price" label="Prix HT €" :value="$animal->price"/>
                    <x-forms.enum :datas="$statuses" name="status" :value="$animal->status"/>
                    <x-forms.select :datas="$types" name="type_id" label="Type" :value="$animal->type?->id"/>
                    <x-forms.select :datas="$breeds" name="breed_id" label="Race" :value="$animal->breed?->id"/>
                    <div class="mt-2">
                        <button class="btn btn-wide">
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
