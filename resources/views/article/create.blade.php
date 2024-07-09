@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Article</h1>
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="posted_at">Posted At</label>
            <input type="datetime-local" name="posted_at" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" minlength="100" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image_source">Image Source</label>
            <input type="text" name="image_source" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" required>
                <option value="news">News</option>
                <option value="blog">Blog</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Article</button>
    </form>
</div>
@endsection
