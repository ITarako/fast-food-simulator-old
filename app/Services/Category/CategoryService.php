<?php

namespace App\Services\Category;

use App\Models\Category\Category;

/**
 * Class CategoryService
 * @package App\Services\Category
 * @property-read CategoryRepository $categoryRepository
 */
class CategoryService
{
    protected CategoryRepository $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store($data): Category
    {
        return $this->categoryRepository->createFormArray($data);
    }

    public function update(Category $category, $data): Category
    {
        return $this->categoryRepository->updateFromArray($category, $data);
    }

    public function destroy(Category $category): ?bool
    {
        return $this->categoryRepository->delete($category);
    }
}
