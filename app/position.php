<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $table = 'positions';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'salary'];
}
