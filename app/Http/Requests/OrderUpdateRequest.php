<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Classes\Dto\OrderUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'string|min:3|max:255',
            'amount'    => 'numeric',
            'address'   => 'string|min:3|max:255'
        ];
    }

    /**
     * @return OrderUpdateDto
     */
    public function getDto(): OrderUpdateDto
    {
        $arParams = $this->validated();

        if (array_key_exists('amount', $arParams)) {
            $arParams['amount'] = (double)$arParams['amount'];
        }

        return new OrderUpdateDto($arParams);
    }
}
