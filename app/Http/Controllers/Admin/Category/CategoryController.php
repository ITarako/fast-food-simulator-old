<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Category\Requests\StoreRequest;
use App\Http\Controllers\Admin\Category\Requests\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Services\Category\CategoryService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin\Category
 * @property-read CategoryService $categoryService
 */
class CategoryController extends Controller
{
    private CategoryService $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index(): View
    {
        $models = Category::paginate();
        return view('admin.category.index', [
            'models' => $models,
        ]);
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->categoryService->store($request->getFormData());
        return redirect(route('admin.category.index'));
    }

    public function show(Category $category): View
    {
        return view('admin.category.show', [
            'category' => $category,
        ]);
    }

    public function edit(Category $category): View
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $this->categoryService->update($category, $request->getFormData());
        return redirect(route('admin.category.index'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryService->destroy($category);
        return redirect(route('admin.category.index'));
    }
}
