<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MachineManagement;

class MachineParameter extends Model
{
    use HasFactory;

    // public function machine_mold_details(){
    //     return $this->hasMany(MachineMold::class, 'machine_parameter_id', 'id');
    // } // info hasOne, details hasMany

    // public function machine_heater(){
    //     return $this->hasMany(MachineHeater::class, 'machine_parameter_id', 'id');
    // } // info hasOne, details hasMany

}
