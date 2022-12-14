<?php

namespace App\Http\Requests;

use App\Models\Fuel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFuelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:fuels',
            ],
            'price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
