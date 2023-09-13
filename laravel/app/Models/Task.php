<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'assigned',
        'created_at',
        'description',
        'title',
        'subtasks',
    ];

    protected $casts = [
        'subtasks' => 'array',
    ];
}
