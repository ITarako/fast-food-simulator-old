<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Product\Requests\StoreRequest;
use App\Http\Controllers\Admin\Product\Requests\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\Category\CategoryRepository;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin\Product
 * @property-read ProductService $productService
 * @property-read CategoryRepository $categoryRepository
 */
class ProductController extends Controller
{
    private ProductService $productService;
    private CategoryRepository $categoryRepository;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductService $productService, CategoryRepository $categoryRepository)
    {
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
    }


    public function index(): View
    {
        $models = Product::paginate();
        return view('admin.product.index', [
            'models' => $models,
        ]);
    }

    public function create(): View
    {
        $categories = $this->categoryRepository->list();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->productService->store($request->getFormData());
        return redirect(route('admin.product.index'));
    }

    public function show(Product $product): View
    {
        return view('admin.product.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product): View
    {
        return view('admin.product.edit', [
            'product' => $product,
        ]);
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $this->productService->update($product, $request->getFormData());
        return redirect(route('admin.product.index'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->productService->destroy($product);
        return redirect(route('admin.product.index'));
    }
}
