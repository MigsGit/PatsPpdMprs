<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            /*

machine_parameter1:
device_name:
no_of_cavity:
material_mixing_ratio_v:
material_mixing_ratio_r:
material_name:
color:
machine_no:
shot_weight:
unit_weight:



                machine_parameter1:
                device_name:
                no_of_cavity:
                material_mixing_ratio_v:
                material_mixing_ratio_r:
                material_name:
                color:
                machine_no:
                shot_weight:
                unit_weight:
                hi_v:
                mid_slow:
                low_l:
                obstacle_check_tm:
                slow_start:
                slow_end:
                lvlp:
                hpcl:
                mid_sl_p:
                low_p:
                hi_p:
                ej_pres:
                fwd_ev1:
                fwd_ev2:
                fwd_stop:
                bwd_stop:
                count:
                pattern:
                open_end_v:
                hi_velocity_2:
                hi_velocity_1_percent:
                open_v:
                tmp_stop_time:
                open_stop:
                low_distance:
                hi_velocity_1mm:
                tmp_stop_pos:
                hot_sprue_set:
                nozzle_set:
                front_set:
                mid_set:
                rear_set:
                hot_sprue_actual:
                nozzle_actual:
                front_actual:
                mid_actual:
                rear_actual:
            */
        ];
    }
}
