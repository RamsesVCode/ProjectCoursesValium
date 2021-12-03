<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:20|max:70',
            'description' => 'required|string|min:20|max:150',
            'url' => ['required','regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            'platform_id' => [
                'required',
                Rule::exists('platforms','id'),
            ],
        ];
        if($this->platform_id==2){
            $rules['url'] = [
                'required',
                'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'
            ];
        }
        return $rules;
    }
}
