
@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h1>{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>
        <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
