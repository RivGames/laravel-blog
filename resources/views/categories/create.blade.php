@extends('layouts.app')

@section('title', 'Create an Category')

@section('main')
    <h1 class="text-3xl font-semibold mb-4">Create New Category</h1>
    @if ($errors->any())
        <div class="text-red-500 font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action=" {{route('categories.store')}} " method="POST" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter category title"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Create Category
            </button>
        </div>
    </form>
@endsection
