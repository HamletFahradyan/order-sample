<?php
declare(strict_types=1);

namespace App\Classes\Dto;


use Spatie\DataTransferObject\DataTransferObject;

class OrderStoreDto extends DataTransferObject
{
    /**
     * @var string
     */
    public string $full_name;

    /**
     * @var float
     */
    public float $amount;

    /**
     * @var string
     */
    public string $address;
}
