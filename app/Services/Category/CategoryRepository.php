<?php

namespace App\Services\Category;

use App\Models\Category\Category;

/**
 * Class CategoryRepository
 * @package App\Services\Category
 */
class CategoryRepository
{
    public function find(int $id)
    {
        return Category::find($id);
    }

    public function search(array $filters = [])
    {
        return Category::paginate();
    }

    public function createFormArray(array $data): Category
    {
        $category = new Category();
        $category->create($data);
        return $category;
    }

    public function updateFromArray(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): ?bool
    {
        return $category->delete();
    }
}
