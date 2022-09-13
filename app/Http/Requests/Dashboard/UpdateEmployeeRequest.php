<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name1' => 'required|string',
            'email1' => 'required|email|unique:employees,email,'.$this->id,
            'designation1' => 'required|string',
            'address1' => 'required|string',
            'phone1' => 'required|string',
            'salary1' => 'required|numeric'
        ];
    }
}
