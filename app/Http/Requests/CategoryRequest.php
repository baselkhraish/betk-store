<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
    public function rules($id = 0)
    {
        return [
            // "required|string|min:3|max:255|unique:categories,name,$id"
            'name' => [
                'required','string','min:3','max:255','unique:categories,name'
                // Rule::unique('categories','name')->ignore($id),
            ],

            // 'image'=>['image','max:1048576'],

        ];
    }
    public function messages()
    {
        return[
            'required'=>'This field (:attribute) is require',
            'name.uniqe'=>'This name is already exists!'
        ];
    }
}
