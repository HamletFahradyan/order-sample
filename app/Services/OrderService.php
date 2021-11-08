<?php
declare(strict_types=1);

namespace App\Services;

use App\Classes\Contracts\OrderService as OrderServiceContract;
use App\Classes\Dto\OrderStoreDto;
use App\Classes\Dto\OrderUpdateDto;
use App\Models\Order;

class OrderService implements OrderServiceContract
{
    /**
     * @inheritDoc
     */
    public function store(OrderStoreDto $obOrderDto): Order
    {
        return Order::create($obOrderDto->toArray());
    }

    /**
     * @inheritDoc
     */
    public function update(OrderUpdateDto $obOrderUpdateDto, Order $obOrder): Order
    {
        $obOrder->update(array_filter($obOrderUpdateDto->toArray()));

        return $obOrder;
    }
}
