<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnjectionVelocityRequest extends FormRequest
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
            'injection_time' => ['required','numeric'],
            'cooling_time' => ['required','numeric'],
            'cycle_start' => ['required','numeric'],
            'v6' => ['required','numeric'],
            'v5' => ['required','numeric'],
            'v4' => ['required','numeric'],
            'v3' => ['required','numeric'],
            'v2' => ['required','numeric'],
            'v1' => ['required','numeric'],
            'v1_unit' => ['required','numeric'],
            'veloc_no' => ['required','numeric'],
            'sv5' => ['required','numeric'],
            'sv4' => ['required','numeric'],
            'sv3' => ['required','numeric'],
            'sv2' => ['required','numeric'],
            'sv1' => ['required','numeric'],
            'sm' => ['required','numeric'],
            'sd' => ['required','numeric'],
            'pp3' => ['required','numeric'],
            'pp2' => ['required','numeric'],
            'pp1' => ['required','numeric'],
            'pp1_unit' => ['required','numeric'],
            'press_no' => ['required','numeric'],
            'tp2' => ['required','numeric'],
            'tp1' => ['required','numeric'],
            'change_mode' => ['required','numeric'],
            'vs' => ['required','numeric'],
            'pb' => ['required','numeric'],
            'pb_unit' => ['required','numeric'],
            'pv3' => ['required','numeric'],
            'pv2' => ['required','numeric'],
            'pv1' => ['required','numeric'],
            'sp2' => ['required','numeric'],
            'sp1' => ['required','numeric'],
        ];
    }
}
