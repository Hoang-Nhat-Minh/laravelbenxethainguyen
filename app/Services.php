<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'header',
        'avatar',
        'shortInfo',
        'detailInfo',
        'slug',
    ];

    protected $table = 'services';
}
