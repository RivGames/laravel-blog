@extends('layouts.app')
@section('title','Main')
@section('main')
    <div class="mb-8">
        <h1 class="text-3xl font-semibold mb-4">Latest Articles</h1>
        <ul>
          <li>
            <a href="/articles/1" class="hover:text-blue-500">Article 1</a>
          </li>
          <li>
            <a href="/articles/2" class="hover:text-blue-500">Article 2</a>
          </li>
        </ul>
      </div>
@endsection