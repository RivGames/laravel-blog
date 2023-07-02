<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Jobs\CreatedNewArticle;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, ArticleService $articleService)
    {
        $articleService->create($request->validated(), auth()->id());

        CreatedNewArticle::dispatch($request->user());

        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article, ArticleService $articleService)
    {
        $articleService->update($request->validated(), $article);

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, ArticleService $articleService)
    {
        $articleService->destroy($article);

        return redirect()->route('main');
    }
}
