@extends('layouts.app')

@section('page-title', 'Modifica '.$category->title)

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

            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div>
                    <label for="">Titolo</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title', $category->title) }}">
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
