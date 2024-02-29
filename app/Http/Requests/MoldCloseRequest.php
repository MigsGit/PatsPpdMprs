<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoldCloseRequest extends FormRequest
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
            'hi_v' => ['required','integer'],
            'mid_slow' => ['required','integer'],
            'low_l' => ['required','integer'],
            'obstacle_check_tm' => ['required','integer'],
            'slow_start' => ['required','integer'],
            'slow_end' => ['required','integer'],
            'lvlp' => ['required','integer'],
            'hpcl' => ['required','integer'],
            'mid_sl_p' => ['required','integer'],
            'low_p' => ['required','integer'],
            'hi_p' => ['required','integer'],
            'hi_p_unit' => ['required','integer'],
        ];
    }
}