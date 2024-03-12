<?php

namespace App\Models;

use App\Models\Heater;
use App\Models\Support;
use App\Models\MoldOpen;
use App\Models\MoldClose;
use App\Models\EjectorLub;
use App\Models\InjectionTab;
use App\Models\MachineManagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineParameter extends Model
{
    use HasFactory;

    public function mold_close(){
        return $this->hasOne(MoldClose::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function ejector_lub(){
        return $this->hasOne(EjectorLub::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function mold_open(){
        return $this->hasOne(MoldOpen::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function heater(){
        return $this->hasOne(Heater::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function injection_velocity(){
        return $this->hasOne(InjectionVelocity::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function injection_tab(){
        return $this->hasOne(InjectionTab::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }

    public function support(){
        return $this->hasOne(Support::class, 'machine_parameter_id', 'id')->where('deleted_at');
    }
}
