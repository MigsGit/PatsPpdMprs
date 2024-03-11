<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InjectionTabRequest extends FormRequest
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
        return [ //27 total
            'inj_tab_rv6'                  => ['required','numeric'],
            'inj_tab_rv5'                  => ['required','numeric'],
            'inj_tab_rv4'                  => ['required','numeric'],
            'inj_tab_rv3'                  => ['required','numeric'],
            'inj_tab_rv2'                  => ['required','numeric'],
            'inj_tab_rv1'                  => ['required','numeric'],
            'inj_tab_rp3'                  => ['required','numeric'],
            'inj_tab_rp2'                  => ['required','numeric'],
            'inj_tab_rp1'                  => ['required','numeric'],
            'inj_tab_fill_time'            => ['required','numeric'],
            'inj_tab_plastic_time'         => ['required','numeric'],
            'inj_tab_cycle_time'           => ['required','numeric'],
            'inj_tab_spray_tm'             => ['required','numeric'],
            'inj_tab_screw_most_fwd'       => ['required','numeric'],
            'inj_tab_enj_end_pos'          => ['required','numeric'],
            'inj_tab_airblow_start_time'   => ['required','numeric'],
            'inj_tab_airblow_blow_time'    => ['required','numeric'],
            'inj_tab_md_temp_requirement'  => ['required','numeric'],
            'inj_tab_md_time_requirement'  => ['required','numeric'],
            'inj_tab_md_temp_actual'       => ['required','numeric'],
            'inj_tab_spray_type'           => ['required'],
            'inj_tab_spray'                => ['required'],
            'inj_tab_spray_mode'           => ['required'],
            'inj_tab_spray_side'           => ['required'],
            'inj_tab_ccd'                  => ['required'],
            'inj_tab_esc'                  => ['required'],
            'inj_tab_spray_portion'        => ['required'],
            // 20
            // inj_tab_spray_type: Z
            // inj_tab_spray: NO
            // inj_tab_spray_mode: AUTO
            // inj_tab_spray_side: FIXED
            // inj_tab_ccd: NO
            // inj_tab_esc: NO
            // inj_tab_spray_portion: WHOLE AREA
        ];
    }
}
