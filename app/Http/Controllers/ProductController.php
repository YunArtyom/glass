<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages/product/index');
    }

    public function allProductsPage(): View
    {
        return view('pages/product/products')->with(['products' => Product::all()]);
    }

    public function addProductPage(): View
    {
        return view('pages/product/add-product')->with(['categories' => Category::all()]);
    }

    public function addProduct(ProductFormRequest $request): RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('allProductsPage')->with(['products' => Product::all()]);
    }

    public function editProductPage(Request $request): View
    {
        $product = Product::find($request->id);
        return view('pages/product/edit-product')
            ->with(['product' => $product])
            ->with(['oldCategory' => $product->category])
            ->with(['categories' => Category::where('title', '!=', $product->category->title)->get()]);
    }

    public function editProduct(ProductFormRequest $request): RedirectResponse
    {
        Product::query()->where('id', '=', $request->id)->update($request->validated());
        return redirect()->route('allProductsPage')->with(['products' => Product::all()]);
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        Product::find($request->id)->delete();
        return redirect()->route('allProductsPage')->with(['products' => Product::all()]);
    }

    public function infoPage(Request $request): View
    {
        return view('pages/product/info-product')->with(['product' => Product::find($request->id)]);
    }

    public function allCategoriesPage(): View
    {
        return view('pages/product/categories')->with(['categories' => Category::all()]);
    }

    public function addCategoryPage(): View
    {
        return view('pages/product/add-category');
    }

    public function addCategory(CategoryFormRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return redirect()->route('allCategoriesPage')->with(['categories' => Category::all()]);
    }

    public function editCategoryPage(Request $request): View
    {
        return view('pages/product/edit-category')->with(['category' => Category::find($request->id)]);
    }

    public function editCategory(CategoryFormRequest $request): RedirectResponse
    {
        Category::query()->where('id', '=', $request->id)->update($request->validated());
        return redirect()->route('allCategoriesPage')->with(['categories' => Category::all()]);
    }

    public function deleteCategory(Request $request): RedirectResponse
    {
        Category::find($request->id)->delete();
        return redirect()->route('allCategoriesPage')->with(['categories' => Category::all()]);
    }
}
