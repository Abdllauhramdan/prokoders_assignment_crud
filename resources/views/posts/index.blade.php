
@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        @if($posts->count())
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        <div class="float-right">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No posts available.</p>
        @endif
    </div>
@endsection

