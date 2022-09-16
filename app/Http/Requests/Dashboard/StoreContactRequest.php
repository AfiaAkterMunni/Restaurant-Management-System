<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        return url('/contact');
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
            'email' => 'required|email|unique:contacts,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }
}
