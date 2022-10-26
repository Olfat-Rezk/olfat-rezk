<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        "name_en"=>['required','string'] ,
        "name_ar"=>['required','string'],
        "price"=>['required','numeric','between:1,max:99999.99'] ,
        "quantity"=>['nullable','integer'],
        "status"=>['required','in:0,1'],
        "brand_id"=>['nullable','integer','exist:brands,id'],
        "subcategory_id"=>['nullable','integer','exist:subcategories,id'],
        "details_en"=>['nullable','string'],
        "details_ar"=>['nullable','string']

        ];
    }
}
