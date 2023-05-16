<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $userData = $request->validated();

        $article = Article::create([
            'title' => $userData['title'],
            'text' => $userData['text'],
            'user_id' => auth()->id(),
        ]);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images','public');
            
            $article->update([
                'image' => $path,
            ]);
        }
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images','public');
            
            $article->update([
                'image' => $path,
            ]);
        }
        return redirect()->route('articles.show',$article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('main');
    }
}
