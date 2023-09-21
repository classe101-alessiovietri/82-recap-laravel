@extends('layouts.app')

@section('page-title', 'Modifica '.$post->title)

@section('main-content')
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="255" value="{{ old('title', $post->title) }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Seleziona una categoria...</option>
                        @foreach ($categories as $category)
                            <option
                                {{-- Il value sarà l'ID della categoria --}}
                                value="{{ $category->id }}"

                                {{-- Aggiungo l'attributo selected sulla option che era stata precedentemente selezionata --}}
                                @if (old('category_id', $post->category_id) == $category->id)
                                    selected
                                @endif
                                {{-- {{ old('category_id') == $category->id ? 'selected' : '' }} --}}
                                >
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
