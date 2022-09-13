<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        return url('/employees');
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
            'email' => 'required|email|unique:employees,email',
            'designation' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'salary' => 'required|numeric'
        ];
    }
}
