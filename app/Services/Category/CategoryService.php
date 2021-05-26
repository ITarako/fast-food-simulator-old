<?php

namespace App\Services\Category;

use App\Models\Category\Category;

class CategoryService
{
    public function store($data)
    {
        $category = new Category();
        $category->create($data);
        return $category;
    }

    public function update(Category $category, $data)
    {
        $category->update($data);
        return $category;
    }

    public function destroy(Category $category) {
        return $category->delete();
    }
}
