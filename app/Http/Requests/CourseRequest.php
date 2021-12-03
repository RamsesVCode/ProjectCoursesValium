<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        switch ($this->method()){
            case "POST": {
                return [
                    'title' => 'required|min:15|string',
                    'slug' => 'required|min:15|string|unique:courses,slug',
                    'description' => 'required|min:30|max:200',
                    'category_id' => [
                        'required',
                        'numeric',
                        Rule::exists('categories','id'),
                    ],
                    'level_id' => [
                        'required',
                        'numeric',
                        Rule::exists('levels','id'),
                    ],
                    'price_id' => [
                        'required',
                        'numeric',
                        Rule::exists('prices','id'),
                    ],
                    'image' => [
                        'required',
                        'image',
                        'mimes:jpg,jpeg',
                    ],
                ];
            }
            case "PUT": {
                return [
                    'title' => 'required|min:15|string',
                    'slug' => 'required|min:15|string|unique:courses,slug,'.$this->route('course')->id,
                    'description' => 'required|min:30|max:200',
                    'category_id' => [
                        'required',
                        'numeric',
                        Rule::exists('categories','id'),
                    ],
                    'level_id' => [
                        'required',
                        'numeric',
                        Rule::exists('levels','id'),
                    ],
                    'price_id' => [
                        'required',
                        'numeric',
                        Rule::exists('prices','id'),
                    ],
                    'image' => [
                        'image',
                        'mimes:jpg,jpeg',
                    ],            
                ];
            }
            default: {
                return [];
            }
        }
    }
}
