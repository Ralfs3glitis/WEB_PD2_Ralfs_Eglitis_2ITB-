@extends('layout')
@section('content')
    <h1 class="titel">{{ $title }}</h1>
    @if ($errors->any())
        <div>Please fix the errors!</div>
    @endif
    <form method="post" action="{{ $author->exists ? '/authors/patch/' . $author->id : '/authors/put' }}">
        @csrf
        <div class="mb-3">
            <span class="search">
                <label for="author-name" class="form-label">Author name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="author-name" name="name"
                    value="{{ old('name', $author->name) }}">
                @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
            </span>
        </div>
        <button type="submit" class="add" id="add">Save</button>
    </form>
@endsection


