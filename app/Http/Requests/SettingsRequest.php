<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the Setting is authorized to make this request.
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
        $return = [
            'Key'                       => 'NULL',
            'value'                     => 'NULL',
            'sitename'                  => 'required',
            'sitename'                  => 'required',
            'bannerslidertxt1'          => 'required',
            'bannerslidertxt1'          => 'required',
            'bannerslidertxt2'          => 'required',
            'bannersliderptxt'          => 'required',
            'testcentertxt'             => 'required',
            'testptxt'                  => 'required',
            'testyellowtxt'             => 'required',
            'testcentertxt2'            => 'required',
            'audioh4txt'                => 'required',
            'audioptxt'                 => 'required',
            'quoteh5txt'                => 'required',
            'quoteh3txt'                => 'required',
            'shootingspantxt'           => 'required',
            'shootingh3txt'             => 'required',
            'shootingptxt'              => 'required',
            'teamspantxt'               => 'required',
            'team1name'                 => 'required',
            'team2name'                 => 'required',
            'team3name'                 => 'required',
            'team4name'                 => 'required',
            'team1role'                 => 'required',
            'team2role'                 => 'required',
            'team3role'                 => 'required',
            'team4role'                 => 'required',
            'team1fb'                   => 'required',
            'team2fb'                   => 'required',
            'team3fb'                   => 'required',
            'team4fb'                   => 'required',
            'team1tw'                   => 'required',
            'team2tw'                   => 'required',
            'team3tw'                   => 'required',
            'team4tw'                   => 'required',
            'team1in'                   => 'required',
            'team2in'                   => 'required',
            'team3in'                   => 'required',
            'team4in'                   => 'required',
            'footertxt'                 => 'required',
            'facebook'                  => 'required',
            'twitter'                   => 'required',
            'youtube'                   => 'required',
            'insta'                     => 'required',
            'bannersliderimage'         => 'sometimes|image',
            'bannertestisliderimage'    => 'sometimes|image',
            'logosliderimg'             => 'sometimes|image',
            'audioimg'                  => 'sometimes|image',
            'quoteimg'                  => 'sometimes|image',
            'shootingimg'               => 'sometimes|image',
            'team1img'                  => 'sometimes|image',
            'team2img'                  => 'sometimes|image',
            'team3img'                  => 'sometimes|image',
            'team4img'                  => 'sometimes|image',
        ];



        return $return;
    }


    public function attributes()
    {
        return [
            'name'     => trans('main.name'),

        ];
    }
}
