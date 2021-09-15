@extends('layouts.app')

@section('title', 'Show Book')

@section('content')
    <a href="/books">Back To Book List Page</a>
    <h2>Show Book</h2>

    <p>Title: {{ $book->title }}</p>
    <p>Author: {{ $book->author }}</p>
    <p>Publication: {{ $book->publication }}</p>
    <p>Created At: {{ $book->created_at }}</p>
    <p>Updated At: {{ $book->updated_at }}</p>
@endsection