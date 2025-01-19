<?php

namespace App\Services;

use App\Trait\RequestService;
use function config;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService
{
    use RequestService;

    protected $baseUri;
    protected $secret;

    public function __construct()
    {
        $this->baseUri = config('services.orders.base_url');
        $this->secret = config('services.orders.secret');
    }

    public function fetchOrders(): string
    {
        return $this->request('GET', '/api/orders');
    }

    public function fetchOrder($order): string
    {
        return $this->request('GET', "/api/orders/{$order}");
    }

    public function createOrder($data) : string
    {
        return $this->request('POST', '/api/orders', $data);
    }

    public function updateOrder($order, $data) : string
    {
        return $this->request('PATCH', "/api/orders/{$order}", $data);
    }

    public function deleteOrder($order) : string
    {
        return $this->request('DELETE', "/api/orders/{$order}");
    }

}
