@extends('layouts.app')

@section('title','All Categories')

@section('main')
    <ul class="w-48 text-lg font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach($categories as $category)
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">{{$category->title}}</li>
        @endforeach
    </ul>
@endsection
