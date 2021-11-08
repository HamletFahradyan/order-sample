<?php
declare(strict_types=1);

namespace App\Classes\Exceptions;


use Illuminate\Http\Response;

class OrderNotFoundException extends JsonException
{
    /**
     * @var int|null
     */
    protected ?int $statusCode = Response::HTTP_NOT_FOUND;

    /**
     * @var string
     */
    protected $message = 'This order not found';
}
