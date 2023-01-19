<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'activity'        => 'required|integer|exists:activities,id',
            'quantity_people' => 'required|integer',
            'date'            => 'required|date_format:Y-m-d',
        ];
    }
}