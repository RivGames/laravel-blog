<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_returns_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('articles.create'));

        $response->assertSeeText('Create New Article');
        $response->assertOk();
    }

    public function test_unauthenticated_user_cannot_visit_create_page()
    {
        $response = $this->get(route('articles.create'));

        $response->assertRedirect('/login');
    }

    public function test_show_page_returns_success()
    {
        User::factory(2)->create();
        $user = User::factory()->create();
        $article = Article::factory()->create();

        $response = $this->actingAs($user)->get(route('articles.show',$article->id));

        $response->assertSeeText($article->title);
        $response->assertSeeText($article->description);
    }

}
