@extends('layouts.app')

@section('page-title', 'Tutte le categorie')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.categories.create') }}" class="btn w-100 btn-success mb-5">
                + Aggiungi
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">
                                {{ $category->id }}
                            </th>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                {{ $category->slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
