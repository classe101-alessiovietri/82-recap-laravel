@extends('layouts.app')

@section('page-title', 'Tutti i tag')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.tags.create') }}" class="btn w-100 btn-success mb-5">
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
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">
                                {{ $tag->id }}
                            </th>
                            <td>
                                {{ $tag->title }}
                            </td>
                            <td>
                                {{ $tag->slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.tags.show', ['tag' => $tag->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('admin.tags.destroy', ['tag' => $tag->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
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
