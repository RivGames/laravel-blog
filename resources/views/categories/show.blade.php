@extends('layouts.app')

@section('title',$category->title)

@section('main')
    <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">{{$category->title}}</h1>
@endsection
