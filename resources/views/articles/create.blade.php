@extends('layouts.app')

@section('title', 'Create an Article')

@section('main')
    <h1 class="text-3xl font-semibold mb-4">Create New Article</h1>
    @if ($errors->any())
        <div class="text-red-500 font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action=" {{route('articles.store')}} " method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter article title"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="text" class="block text-gray-700 font-semibold mb-2">Text</label>
            <textarea id="text" name="text" rows="5"
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Upload Image</label>
            <input type="file" id="image" name="image"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                Category</label>
            <select id="categories" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id  }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Create Article
            </button>
        </div>
    </form>
@endsection
