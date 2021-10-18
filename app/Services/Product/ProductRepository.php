<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ProductRepository
 * @package App\Services\Product
 */
class ProductRepository
{
    public function find(int $id): ?Product
    {
        /** @var Product|null $model */
        $model = Product::find($id);
        return $model;
    }

    public function search(array $filters = []): LengthAwarePaginator
    {
        return Product::paginate();
    }

    public function createFormArray(array $data): Product
    {
        $category = new Product();
        $category->create($data);
        return $category;
    }

    public function updateFromArray(Product $category, array $data): Product
    {
        $category->update($data);
        return $category;
    }

    public function delete(Product $category): ?bool
    {
        return $category->delete();
    }
}
