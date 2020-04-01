<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvcategoriesRequest extends FormRequest
{
    /**
     * Determine if the pcategories is authorized to make this request.
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
            'title'     => 'required',
            'image'     => 'sometimes|image',
            'keyword'     => 'nullable',
            'summary'     => 'nullable',
            'desc'     => 'nullable',
        ];
    }


    public function attributes()
    {
        return [
            'title'       => trans('main.title'),
            'keyword'       => trans('main.keyword'),
            'summary'       => trans('main.summary'),
            'desc'       => trans('main.desc'),
        ];
    }
}
