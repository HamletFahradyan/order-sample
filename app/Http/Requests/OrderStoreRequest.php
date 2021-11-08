<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Classes\Dto\OrderStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|min:3|max:255',
            'amount'    => 'required|numeric',
            'address'   => 'required|string|min:3|max:255'
        ];
    }

    /**
     * @return OrderStoreDto
     */
    public function getDto(): OrderStoreDto
    {
        $arParams = $this->validated();

        if (array_key_exists('amount', $arParams)) {
            $arParams['amount'] = (double)$arParams['amount'];
        }

        return new OrderStoreDto($arParams);
    }
}
