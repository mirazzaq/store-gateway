<?php

namespace App\Services;

use App\Trait\RequestService;

use function config;


class ProductService
{
    use RequestService;
    protected $baseUri;
    protected $secret;

    public function __construct()
    {
        $this->baseUri = config('services.products.base_uri');
        $this->secret = config('services.products.secret');
    }

    public function fetchProducts() : string
    {
        return $this->request('GET', '/api/products');
    }

    public function fetchProduct($product) : string
    {
        return $this->request('GET', "/api/products/{$product}");
    }

    public function createProduct($data) : string
    {
        return $this->request('POST', '/api/products', $data);
    }

    public function updateProduct($product, $data) : string
    {
        return $this->request('PATCH', "/api/products/{$product}", $data);
    }

    public function deleteProduct($product) : string
    {
        return $this->request('DELETE', "/api/products/{$product}");
    }

}
