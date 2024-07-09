@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-primary">Add Article</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Posted At</th>
                <th>Description</th>
                <th>Image</th>
                <th>Image Source</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $article->author }}</td>
                <td>{{ $article->posted_at }}</td>
                <td>{{ $article->description }}</td>
                <td><img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->author }}" width="50"></td>
                <td>{{ $article->image_source }}</td>
                <td>{{ $article->category }}</td>
                <td>
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('article.destroy', $article) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
