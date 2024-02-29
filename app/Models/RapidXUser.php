<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RapidXDepartment;

class RapidXUser extends Model
{
    protected $table = 'users';
    protected $connection = 'rapidx';

    public function department(){
        return $this->hasOne(RapidXDepartment::class, 'department_id', 'department_id');
    }
}
