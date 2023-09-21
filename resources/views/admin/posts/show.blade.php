@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.posts.create') }}" class="btn w-100 btn-success mb-5">
                + Aggiungi
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            {{ $post->id }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->slug }}
                        </td>
                        <td>
                            {{ $post->content }}
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">
                                Vedi
                            </a>
                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
