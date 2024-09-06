<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staffs";
    protected $primaryKey = "id";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city', 'state', 'country', 'description', 'position', 'department', 'status'
    ];
}