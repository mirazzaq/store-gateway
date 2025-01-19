<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->successResponse($this->productService->fetchProducts());
    }

    public function show($product)
    {
        return $this->successResponse($this->productService->fetchProduct($product));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->productService->createProduct($request->all()));
    }

    public function update(Request $request, $product)
    {
        return $this->successResponse($this->productService->updateProduct($product, $request->all()));
    }

    public function destroy($product)
    {
        return $this->successResponse($this->productService->deleteProduct($product));
    }

}
