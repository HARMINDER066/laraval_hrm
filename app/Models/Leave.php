<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
 use HasFactory;
    protected $table = 'leaves';

       protected $fillable = [
        'admin_id', 'employee_id','leave_reason','datefrom', 'dateto','description','status'
    ];

      public function user()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    } 
      public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    } 
}


