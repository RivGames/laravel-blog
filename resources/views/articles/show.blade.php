@extends('layouts.app')

@section('title',$article->title)

@section('main')
    <div class="mb-8">
        <h1 class="text-center text-3xl font-semibold mb-4">{{ $article->title }}</h1>
        <div class="flex items-center justify-center">
          <img class="object-cover h-48 w-96 rounded-lg" src="{{asset('storage/' . $article->image)}}">
        </div>
        <p class="text-2xl">{{ $article->text }}</p>
    </div>
    <div>
      <p class="font-bold">Author: {{ $article->user->name }}</p>
    </div>
@endsection