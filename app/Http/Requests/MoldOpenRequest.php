<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoldOpenRequest extends FormRequest
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
            'open_end_v' => ['required','numeric'],
            'hi_velocity_2' => ['required','numeric'],
            'hi_velocity_1_percent' => ['required','numeric'],
            'open_v' => ['required','numeric'],
            'tmp_stop_time' => ['required','numeric'],
            'open_stop' => ['required','numeric'],
            'low_distance' => ['required','numeric'],
            'hi_velocity_1mm' => ['required','numeric'],
            'tmp_stop_pos' => ['required','numeric'],
            /*
                open_end_v:
                hi_velocity_2:
                hi_velocity_1_percent:
                open_v:
                tmp_stop_time:
                open_stop:
                low_distance:
                hi_velocity_1mm:
                tmp_stop_pos:
            */
        ];
    }
}
