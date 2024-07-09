@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Article</h1>
    <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
        </div>
        <div class="form-group">
            <label for="posted_at">Posted At</label>
            <input type="datetime-local" name="posted_at" class="form-control" value="{{ $article->posted_at->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" minlength="100" required>{{ $article->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="image_source">Image Source</label>
            <input type="text" name="image_source" class="form-control" value="{{ $article->image_source }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" required>
                <option value="news" {{ $article->category == 'news' ? 'selected' : '' }}>News</option>
                <option value="blog" {{ $article->category == 'blog' ? 'selected' : '' }}>Blog</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</div>
@endsection
