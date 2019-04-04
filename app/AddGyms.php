<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AddGyms extends Model
{   
    use SoftDeletes;
    protected $table = 'add_gyms';
}
