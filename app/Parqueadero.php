<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parqueadero extends Model
{
    use SoftDeletes;
    protected $fillable = ['cupo'];
}
