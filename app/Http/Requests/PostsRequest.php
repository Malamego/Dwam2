<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title'      => 'required',
            'pcat_id'    => 'required|exists:pcategories,id',
            'content'    => 'required',
            'keyword'    => 'required',
            'desc'       => 'required',
            'status'     => 'required|in:active,inactive',
            'image'      => 'required|image',
        ];
    }


    public function attributes()
    {
        return [
            'title'       => trans('main.title'),
            'pcat_id'   => trans('main.pcategory'),
            'content'     => trans('main.content'),
            'keyword'     => trans('main.keyword'),
            'desc'        => trans('main.description'),
            'status'      => trans('main.status'),
            'image'       => trans('main.image'),
        ];
    }
}
