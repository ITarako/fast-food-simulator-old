<?php

namespace App\Services\Category;

use App\Models\Category\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class CategoryRepository
 * @package App\Services\Category
 */
class CategoryRepository
{
    public function find(int $id): ?Category
    {
        /** @var Category|null $model */
        $model = Category::find($id);
        return $model;
    }

    public function search(array $filters = []): LengthAwarePaginator
    {
        return Category::paginate();
    }

    public function list(): Collection
    {
        return Category::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
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
