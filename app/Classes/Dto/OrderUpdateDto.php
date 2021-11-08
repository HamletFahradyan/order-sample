<?php
declare(strict_types=1);

namespace App\Classes\Dto;


use Spatie\DataTransferObject\DataTransferObject;

class OrderUpdateDto extends DataTransferObject
{
    /**
     * @var string|null
     */
    public ?string $full_name = null;

    /**
     * @var float|null
     */
    public ?float $amount = null;

    /**
     * @var string|null
     */
    public ?string $address = null;
}
