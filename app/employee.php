<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employess';
    protected $primaryKey = 'id';
    protected $fillable = ['nik', 'name', 'gender', 'birthdate', 'address', 'phone', 'departmentid', 'positionid'];
}
