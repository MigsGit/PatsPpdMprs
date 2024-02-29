<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Models\RapidXUser;

class UserManagement extends Authenticatable // Authenticatable this will allow the use of Auth::user()
{
    protected $table = 'user_management';
    protected $connection = 'mysql';

    public function rapidx_user(){
        return $this->hasOne(RapidXUser::class, 'id', 'rapidx_id');
    }
}
