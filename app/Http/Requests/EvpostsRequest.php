<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EvpostsRequest extends FormRequest
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
            'evcat_id'    => 'required|exists:evcategories,id',
            'evtaq_id'    => 'required|exists:evtaqs,id',
            'content'      => 'required',
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
            'evcat_id'   => trans('main.evcategory'),
            'content'     => trans('main.content'),
            'keyword'     => trans('main.keyword'),
            'desc'        => trans('main.description'),
            'status'      => trans('main.status'),
            'image'       => trans('main.image'),
        ];
    }
}
