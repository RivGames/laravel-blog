<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_visit_create_page(): void
    {
        $response = $this->get(route('categories.create'));

        $response->assertRedirect('/login');
    }

    public function test_simple_user_cannot_visit_create_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('categories.create'));

        $response->assertForbidden();
    }

    public function test_admin_can_visit_create_page()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;

        $response = $this->actingAs($user)->get(route('categories.create'));

        $response->assertOk();
        $response->assertSee('Create Category');
    }

    public function test_category_store_requires_title_returns_fail()
    {
        $data = [
            'title' => '',
        ];

        $response = $this->post(route('categories.store'), $data);

        $response->assertRedirect();
    }

    public function test_category_store_min_5_returns_fail()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $data = [
            'title' => 'Lin',
        ];

        $response = $this->actingAs($user)->post(route('categories.store'), $data);

        $response->assertInvalid('title');

        $this->assertDatabaseCount('categories', 0);
    }

    public function test_category_store_max_25_returns_fail()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $data = [
            'title' => Str::random(26),
        ];

        $response = $this->actingAs($user)->post(route('categories.store'), $data);

        $response->assertInvalid('title');

        $this->assertDatabaseCount('categories', 0);
    }

    public function test_category_store_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $data = [
            'title' => 'Linux',
        ];

        $response = $this->actingAs($user)->post(route('categories.store'), $data);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('categories', $data);
    }

    public function test_category_index_paginate_15_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        Category::factory(15)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertViewHas('categories');
        $categories = $response->viewData('categories');

        $this->assertCount(15, $categories);
    }

    public function test_category_show_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->get(route('categories.show', $category->id));

        $response->assertViewHas('category');

        $response->assertSee($category->title);
    }

    public function test_category_edit_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->get(route('categories.edit', $category->id));

        $response->assertViewHas('category');

        $response->assertSee($category->title);
    }

    public function test_category_update_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $category = Category::factory()->create();
        $data = [
            'title' => 'Linux'
        ];

        $response = $this->actingAs($user)->patch(route('categories.update',$category->id),$data);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories',$data);
    }

    public function test_category_destroy_returns_success()
    {
        $user = User::factory()->create();
        $user->is_admin = 1;
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->delete(route('categories.destroy',$category->id));

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseCount('categories',0);
    }
}
