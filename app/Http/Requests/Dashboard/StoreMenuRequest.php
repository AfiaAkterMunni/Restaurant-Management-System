<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        return url('/menus');
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
            'image' => 'nullable|mimes:png,jpg',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required'
        ];
    }
}
