@extends('layouts.app')

@section('page-title', $post->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
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
                            @if ($post->category)
                                <a href="{{ route('admin.categories.show', ['category' => $post->category->id]) }}">
                                    {{ $post->category->title }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{ $post->content }}
                        </td>
                        <td>
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
