<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        return url('/reservation');
    }
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'table_no' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'guest_no' => 'required|numeric'
        ];
    }
}
