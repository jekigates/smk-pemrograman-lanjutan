@extends('layouts.app')

@section('title', 'Books List')

@section('content')
    <div style="background: #388BF2; font-size: 24px; color: white;">
        Simple Library App
    </div>

    <div style="margin: 20px 0;">
        <table border="1">
            <!-- <a href="/books/add">Add New Book</a> -->
            <a href="/books/create">Add New Book</a>

            <thead>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publication</th>
                <th>Year</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <a href="{{ url('/books', $book->id) }}">{{ $book->title }}</a>
                        </td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publication }}</td>
                        <td>{{ $book->year }}</td>
                        <td>
                            <a href="{{ url('/books') }}/{{ $book->id }}/edit">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="/books/{{ $book->id }}">
                                {{ @csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div>
                                    <input type="submit" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection