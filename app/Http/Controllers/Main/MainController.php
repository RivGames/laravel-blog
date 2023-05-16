<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::query()->select(['id', 'title'])->get();

        return view('main.main', compact('articles'));
    }
    public function about()
    {
        return view('main.about');
    }
}
