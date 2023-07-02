<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getPaginatedCategories(int $perPage = 15)
    {
        return Category::paginate($perPage);
    }

    public function createCategory(array $userData)
    {
        Category::create($userData);
    }

    public function updateCategory(array $userData, Category $category)
    {
        $category->update($userData);
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}
