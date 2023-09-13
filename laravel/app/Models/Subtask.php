<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Subtask extends Model
{
    protected $fillable = [
        'id',
        'title',
    ];
}
