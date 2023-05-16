@extends('layouts.app')
@section('title', 'Main')
@section('main')
    <div class="mb-8">
        <h1 class="text-3xl font-semibold mb-4">Latest Articles</h1>
        <ul class="text-3xl">
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}" class="hover:text-blue-500">{{ $article->title }}</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-900 hover:text-blue-800">Edit</a>
                    <form action=" {{ route('articles.destroy', $article->id) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="text-red-500">
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
