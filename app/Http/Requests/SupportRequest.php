<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'support_v6' => ['required','numeric'],
            'support_v5' => ['required','numeric'],
            'support_v4' => ['required','numeric'],
            'support_v3' => ['required','numeric'],
            'support_v2' => ['required','numeric'],
            'support_v1' => ['required','numeric'],
            'support_pp3' => ['required','numeric'],
            'support_pp2' => ['required','numeric'],
            'support_pp1' => ['required','numeric'],
            'support_fill_p' => ['required','numeric'],
            'support_bp' => ['required','numeric'],
            'support_fill_time' => ['required','numeric'],
            'support_plastic_time' => ['required','numeric'],
            'support_cycle_time' => ['required','numeric'],
            'support_spray_tm' => ['required','numeric'],
            'support_screw_most_fwd' => ['required','numeric'],
            'support_enj_end_pos' => ['required','numeric'],
            'support_airblow_start_time' => ['required','numeric'],
            'support_airblow_blow_time' => ['required','numeric'],
            'support_md_temp_requirement' => ['required','numeric'],
            'support_md_time_requirement' => ['required','numeric'],
            'support_md_temp_actual' => ['required','numeric'],

            'support_spray_type' => ['required'],
            'support_spray' => ['required'],
            'support_spray_mode' => ['required'],
            'support_spray_side' => ['required'],
            'support_ccd' => ['required'],
            'support_esc' => ['required'],
            'support_spray_portion' => ['required'],
        ];
    }
}
