<?php

namespace App\Services\Product;

use App\Models\Product\Product;

/**
 * Class ProductService
 * @package App\Services\Product
 * @property-read ProductRepository $categoryRepository
 */
class ProductService
{
    protected ProductRepository $categoryRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $categoryRepository
     */
    public function __construct(ProductRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(array $data): Product
    {
        return $this->categoryRepository->createFormArray($data);
    }

    public function update(Product $category, array $data): Product
    {
        return $this->categoryRepository->updateFromArray($category, $data);
    }

    public function destroy(Product $category): ?bool
    {
        return $this->categoryRepository->delete($category);
    }
}
