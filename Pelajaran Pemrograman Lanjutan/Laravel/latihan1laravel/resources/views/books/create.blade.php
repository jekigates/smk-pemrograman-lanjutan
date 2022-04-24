@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
    <a href="/books">Back To Book List Page</a>
    <h2>Form Book Create Page</h2>

    <form action="/books" method="POST">
        @csrf

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
                        <input type="text" id="title" name="title" placeholder="Title">
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
                        <input type="text" id="author" name="author" placeholder="Author">
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
                        <input type="text" id="publication" name="publication" placeholder="Publication">
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
                        <input type="text" id="year" name="year" placeholder="Year">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Store</button>
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