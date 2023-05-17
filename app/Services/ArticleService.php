<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function create(mixed $userData, int $user_id)
    {
        $article = Article::create([
            'title' => $userData['title'],
            'text' => $userData['text'],
            'user_id' => $user_id,
        ]);

        if (isset($userData['image'])) {
            $path = Storage::disk('public')->put('images', $userData['image']);

            $article->update([
                'image' => $path,
            ]);
        }
    }

    public function update(mixed $userData, Article $article)
    {
        $article->update($userData);

        if (isset($userData['image'])) {
            $path = Storage::disk('public')->put('images', $userData['image']);

            $article->update([
                'image' => $path,
            ]);
        }
    }

    public function destroy(Article $article)
    {
        $article->delete();
    }
}
