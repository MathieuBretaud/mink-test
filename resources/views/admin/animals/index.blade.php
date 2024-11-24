@extends('admin.base')

@section('title', 'Tous les animaux')

@section('content')

    <div class="flex justify-between items-center">
        <h1 class="text-xl">@yield('title')</h1>
        <a href="{{route('admin.animal.create')}}" class="btn">Ajouter un animal</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Age</th>
            <th>Prix HT</th>
            <th>Type</th>
            <th>Race</th>
            <th>Statut</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->age }}</td>
                <td>{{ number_format($animal->price, thousands_separator: ' ') }} €</td>
                <td>{{ $animal->type->name }}</td>
                <td>{{ $animal->breed->name }}</td>
                <td>{{ __('status.' . $animal->status) }}</td>
                <td>
                    <div class="flex gap-2 w-full justify-end">
                        @can('update', $animal)
                            <a class="btn btn-primary" href="{{ route('admin.animal.edit', $animal) }}">Editer</a>
                        @endcan
                        @can('delete', $animal)
                            <form action="{{route('admin.animal.destroy', $animal)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-error">Supprimer</button>
                            </form>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $animals->links() }}
    </div>
@endsection
