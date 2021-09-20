<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
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
            'name' => 'required | max:100 | unique:offers,name',
            'price' => 'required | numeric',
            'photo' => 'required',
        ];
    }

    public  function  messages()
    {
        return [
            'name.required ' =>__('messages.Field name is required'),
            'name.unique' => __('messages.Filed value is exists'),
            'price.required' => __('messages.Field price is required'),
            'price.numeric' => __('messages.Filed value should contains numbers only'),
        ];
    }
}
