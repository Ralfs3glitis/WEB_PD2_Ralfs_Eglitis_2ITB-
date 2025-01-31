@extends('layout')
@section('content')
    <h1 class="titel">{{ $title }}</h1>
    @if ($errors->any())
        <div>Please fix the errors!</div>
    @endif
    <form method="post" action="{{ $genre->exists ? '/genres/patch/' . $genre->id : '/genres/put' }}">
        @csrf
        <div class="mb-3">
            <span class="search">
                <label for="genre-name" class="form-label">Genre name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="genre-name" name="name"
                    value="{{ old('name', $genre->name) }}">
                @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
            </span>
        </div>
        <button type="submit" class="add" id="add">Save</button>
    </form>
@endsection


