<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_returns_success(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        $response->assertSeeText('About');
    }

    public function test_index_page_returns_success(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_main_contains_ten_articles()
    {
        User::factory(2)->create();

        Article::factory(10)->create();

        $response = $this->get('/');

        $response->assertViewHas('articles', function ($articles) {
            return $articles->count() == 10;
        });
    }
}
