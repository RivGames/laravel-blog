<?php

namespace App\Services;

use App\Jobs\ImageResizeJob;
use App\Jobs\SendUserEmailPhotoJob;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ArticleService
{
    /**
     * @throws Throwable
     */
    public function create(mixed $userData, int $user_id): void
    {
        $article = Article::create([
            'title' => $userData['title'],
            'text' => $userData['text'],
            'user_id' => $user_id,
            'category_id' => $userData['category'],
        ]);

        if (isset($userData['image'])) {
            $path = Storage::disk('public')->put('images', $userData['image']);

            $article->update([
                'image' => $path,
            ]);
            ImageResizeJob::dispatch($path);
            SendUserEmailPhotoJob::dispatch(User::find($user_id));
        }
    }

    public function update(mixed $userData, Article $article)
    {
        $article->update([
            'title' => $userData['title'],
            'text' => $userData['text'],
            'category_id' => $userData['category'],
        ]);

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
