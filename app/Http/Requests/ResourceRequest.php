<?php

namespace App\Http\Requests;

use App\Models\Resource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResourceRequest extends FormRequest
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
        switch($this->method()){
            case "POST":
                $rules = [
                    'name' => 'required|min:10|max:60',
                    'description' => 'required|min:10|max:100',
                    'type' => [
                        'required',
                        Rule::in([Resource::ZIP,Resource::PDF,Resource::IMAGE])
                    ],
                ];
                // For PDF
                if($this->type==Resource::PDF){
                    $rules['file'] = 'required|max:20000|mimes:pdf';
                }
                // For Image
                if($this->type == Resource::IMAGE){
                    $rules['file'] = 'required|max:20000|mimes:jpg,jpeg';
                }
                // For Zip
                if($this->type == Resource::ZIP){
                    $rules['file'] = 'required|max:20000|mimes:zip,rar';
                }
                break;
            case "PUT":
                $rules = [
                    'name' => 'required|min:10|max:60',
                    'description' => 'required|min:10|max:100',
                ];
                $file = request('file');
                if($file){
                    $rules['type'] = [
                        'required',
                        Rule::in([Resource::ZIP,Resource::PDF,Resource::IMAGE])
                    ];
                    // For PDF
                    if($this->type==Resource::PDF){
                        $rules['file'] = 'required|max:20000|mimes:pdf';
                    }
                    // For Image
                    if($this->type == Resource::IMAGE){
                        $rules['file'] = 'required|max:20000|mimes:jpg,jpeg';
                    }
                    // For Zip
                    if($this->type == Resource::ZIP){
                        $rules['file'] = 'required|max:20000|mimes:zip,rar';
                    }
                }
                break;
            case "default":
                break;
        }
        return $rules;
    }
}
