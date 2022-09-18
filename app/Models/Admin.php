<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
       'name', 'phone', 'email','is_super','company_name', 'type', 'status','remember_token','identity_no', 'date_of_birth', 'password','address','image','joining_date','deleted_at','created_at','updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}