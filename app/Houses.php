<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    protected $fillable = [
        'header',
        'avatar',
        'shortInfo',
        'detailInfo',
        'slug',
        'boss',
    ];

    protected $table = 'houses';
}
