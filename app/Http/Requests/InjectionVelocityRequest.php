<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InjectionVelocityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'injection_time'=> ['required','numeric'],
            'cooling_time'=> ['required','numeric'],
            'cycle_start'=> ['required','numeric'],
            'inj_pp2'=> ['required','numeric'],
            'inj_pp3'=> ['required','numeric'],
            'inj_pp1'=> ['required','numeric'],
            'inj_pp1_unit' => ['required','numeric'],
            'inj_v1_unit'=> ['required','numeric'],
            'inj_v1'=> ['required','numeric'],
            'inj_v2'=> ['required','numeric'],
            'inj_v3'=> ['required','numeric'],
            'inj_v4'=> ['required','numeric'],
            'inj_v6'=> ['required','numeric'],
            'inj_v5'=> ['required','numeric'],
            'inj_sv1'=> ['required','numeric'],
            'inj_sv2'=> ['required','numeric'],
            'inj_sv3'=> ['required','numeric'],
            'inj_sv4'=> ['required','numeric'],
            'inj_sv5'=> ['required','numeric'],
            'inj_sm'=> ['required','numeric'],
            'inj_sd'=> ['required','numeric'],
            'inj_veloc_no'=> ['required','numeric'],
            'inj_press_no'=> ['required','numeric'],
            'inj_tp1'=> ['required','numeric'],
            'inj_tp2'=> ['required','numeric'],
            'inj_pos_change_mode'=> ['required','numeric'],
            'inj_pos_vs'=> ['required','numeric'],
            'inj_pos_pb'=> ['required','numeric'],
            'inj_pos_pb_unit'=> ['required','numeric'],
            'inj_pv1_unit'=> ['required','numeric'],
            'inj_pv1'=> ['required','numeric'],
            'inj_pv2'=> ['required','numeric'],
            'inj_pv3'=> ['required','numeric'],
            'inj_sp1'=> ['required','numeric'],
            'inj_sp2'=> ['required','numeric'],
        ];
    }
}
