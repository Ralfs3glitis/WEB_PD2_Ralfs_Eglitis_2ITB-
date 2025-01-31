@extends('layout')
@section('content')
    <h1 class="titel">{{ $title }}</h1>
    @if (count($items) > 0)
        <table class="tab">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Published</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->genre->name }}</td>
                        <td>{{ $book->year }}</td>
                        <td>&euro; {{ number_format($book->price, 2, '.', ',') }}</td>
                        <td>{!! $book->display ? '&#x2714;' : '&#x274C;' !!}</td>
                        <td>
                            <button type="button" class="add" id="add" onclick="window.location.href='/books/update/{{ $book->id }}';"><i class="fa fa-gear"></i></button>
                            <form method="post" action="/books/delete/{{ $book->id }}" class="deletionform d-inline">
                                @csrf
                                <button type="submit" class="add"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No entries found in database </p>
    @endif
    <button type="button" class="add" id="add" onclick="window.location.href='/books/create';"> &plus; </button>
@endsection
