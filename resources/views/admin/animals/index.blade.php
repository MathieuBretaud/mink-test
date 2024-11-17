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
            <th>Prix</th>
            <th>Type</th>
            <th>Race</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->age }}</td>
                <td>{{ number_format($animal->price, thousands_separator: ' ') }}</td>
                <td>{{ $animal->type }}</td>
                <td>{{ $animal->breed }}</td>
                <td>{{ $animal->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $animals->links() }}
@endsection
