@extends('layouts.app')

@section('page-title', 'Aggiungi un tag')

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

            <form action="{{ route('admin.tags.store') }}" method="post">
                @csrf

                <div>
                    <label for="">Titolo</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title') }}">
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
