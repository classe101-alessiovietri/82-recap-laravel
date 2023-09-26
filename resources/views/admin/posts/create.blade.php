@extends('layouts.app')

@section('page-title', 'Aggiungi un post')

@section('main-content')
    <div class="row">
        <div class="col bg-info-subtle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="255" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Immagine di copertina</label>
                    <input class="form-control" type="file" name="cover_img" id="cover_img" accept="image/*">
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
                                @if (old('category_id') == $category->id)
                                    selected
                                @endif
                                {{-- {{ old('category_id') == $category->id ? 'selected' : '' }} --}}
                                >
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Tag</label>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="tags[]"
                                id="tag-{{ $tag->id }}"
                                value="{{ $tag->id }}"
                                @if (
                                    in_array(
                                        $tag->id,
                                        old('tags', [])
                                    )
                                )
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->title }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
