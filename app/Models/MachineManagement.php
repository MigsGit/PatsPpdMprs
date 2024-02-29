<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineManagement extends Model
{
    // use HasFactory;
    protected $table = 'machine';
    protected $connection = 'mysql';
}
