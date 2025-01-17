<?php

namespace App\Http\Requests;

use App\Models\Poste;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'product_name'=> 'required',
            'price'=>'required|numeric',
            'description'=> 'required',
            'amazon_link'=>'required',
        ];
    }
}
