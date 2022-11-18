<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'company' => [
                'string',
                'nullable',
            ],
            'plate_number' => [
                'string',
                'required',
            ],
            'fuel_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'order_size' => [
                'required',
            ],
            'preferred_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_id' => [
                'required',
                'integer',
            ],
            'payment_status' => [
                'required',
            ],
        ];
    }
}
