<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Classes\Exceptions\OrderNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    /**
     * @var OrderService $obOrderService
     */
    private OrderService $obOrderService;

    /**
     * OrderController constructor.
     * @param OrderService $obOrderService
     */
    public function __construct(OrderService $obOrderService)
    {
        $this->obOrderService = $obOrderService;
    }

    /**
     * @param OrderStoreRequest $obOrderStoreRequest
     * @return OrderResource
     */
    public function store(OrderStoreRequest $obOrderStoreRequest): OrderResource
    {
        $obOrderDto = $obOrderStoreRequest->getDto();
        $obOrder = $this->obOrderService->store($obOrderDto);

        return OrderResource::make($obOrder)
            ->additional([
                'status'  => 'success',
                'message' => 'Order created successfully',
            ]);
    }

    /**
     * @param string $sNumber
     * @param OrderUpdateRequest $obOrderUpdateRequest
     * @return OrderResource
     */
    public function update(string $sNumber, OrderUpdateRequest $obOrderUpdateRequest): OrderResource
    {
        try {
            $obOrder = Order::whereNumber($sNumber)->firstOrFail();
            $obOrderDto = $obOrderUpdateRequest->getDto();
            $obOrder = $this->obOrderService->update($obOrderDto, $obOrder);

            return OrderResource::make($obOrder)
                ->additional([
                    'status' => 'success',
                    'message' => 'Order updated successfully',
                ]);
        } catch (ModelNotFoundException $e) {
            throw new OrderNotFoundException();
        }
    }

    /**
     * @param string $sNumber
     * @return OrderResource
     */
    public function show(string $sNumber): OrderResource
    {
        try {
            $obOrder = Order::whereNumber($sNumber)->firstOrFail();

            return OrderResource::make($obOrder)
                ->additional([
                    'status' => 'success'
                ]);
        } catch (ModelNotFoundException $e) {
            throw new OrderNotFoundException();
        }
    }
}
