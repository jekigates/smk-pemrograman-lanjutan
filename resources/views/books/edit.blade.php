@extends('layouts.app')

@section('title', 'Update Book')

@section('content')
    <a href="/books">Back To Book List Page</a>
    <h2>Form Book Update Page</h2>

    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                        <label for="title">:</label>
                    </td>
                    <td>
                        <input type="text" id="title" name="title" placeholder="Title" value="{{ $book->title }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="author">Author</label>
                    </td>
                    <td>
                        <label for="author">:</label>
                    </td>
                    <td>
                        <input type="text" id="author" name="author" placeholder="Author" value="{{ $book->author }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="publication">Publication</label>
                    </td>
                    <td>
                        <label for="publication">:</label>
                    </td>
                    <td>
                        <input type="text" id="publication" name="publication" placeholder="Publication" value="{{ $book->publication }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="year">Year</label>
                    </td>
                    <td>
                        <label for="year">:</label>
                    </td>
                    <td>
                        <input type="text" id="year" name="year" placeholder="Year" value="{{ $book->year }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Update</button>
                    </td>
                    <td></td>
                    <td>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection