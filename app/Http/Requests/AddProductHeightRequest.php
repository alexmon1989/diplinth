<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddProductHeightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required|integer',
            'price' => 'required|integer',
            'available' => 'boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'value.required' => 'Поле "Значение" обязательно для заполнения.',
            'value.integer' => 'Поле "Значение" должно содержать целочисленное значение.',
            'price.required' => 'Поле "Стоимость" обязательно для заполнения.',
            'price.integer' => 'Поле "Цена" должно содержать числовое значение.',
            'available.boolean'  => 'Значение поля "Доступно" должно иметь булев тип.',
        ];
    }
}
