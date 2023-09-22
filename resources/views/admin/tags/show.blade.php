@extends('layouts.app')

@section('page-title', $tag->title)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
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
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col bg-light">
            <h2>
                Post con questo tag
            </h2>

            <ul>
                @foreach ($tag->posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
