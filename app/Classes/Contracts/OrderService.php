<?php
declare(strict_types=1);

namespace App\Classes\Contracts;


use App\Classes\Dto\OrderStoreDto;
use App\Classes\Dto\OrderUpdateDto;
use App\Models\Order;

interface OrderService
{
    /**
     * @param OrderStoreDto $obOrderStoreDto
     * @return Order
     */
    public function store(OrderStoreDto $obOrderStoreDto): Order;

    /**
     * @param OrderUpdateDto $obOrderUpdateDto
     * @param Order $obOrder
     * @return Order
     */
    public function update(OrderUpdateDto $obOrderUpdateDto, Order $obOrder): Order;
}
