<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name1' => 'required|string',
            'image1' => 'nullable|mimes:png,jpg',
            'details1' => 'required|string',
            'price1' => 'required|numeric',
            'category1' => 'required'
        ];
    }
}
