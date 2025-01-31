@extends('layout')
@section('content')
<h1 class="titel">{{ $title }}</h1>
@if (count($items) > 0)
<table class="tab">
    <thead class="thead-light">
        <tr>
            <th>ID</td>
            <th>Name</td>
            <th>Edit</td>
            <th>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td><button type="button" class="add" id="add" onclick="window.location.href='/authors/update/{{ $author->id }}';"><i class="fa fa-gear"></i></button></td>
            <td>
                <form action="/authors/delete/{{ $author->id }}" method="post" class="deletionform d-inline">
                @csrf
                <button type="submit" class="add"><i class="fa fa-trash"></i></button>
               </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No entries found in database</p>
@endif
<button type="button" class="add" id="add" onclick="window.location.href='/authors/create';"> &plus; </button>

@endsection