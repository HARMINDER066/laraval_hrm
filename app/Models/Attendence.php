<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
 use HasFactory;
    protected $table = 'attendances'; 
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'user_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
}