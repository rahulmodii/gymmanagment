<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class People extends Model
{
    use SoftDeletes;
    protected $table ='people';
}
