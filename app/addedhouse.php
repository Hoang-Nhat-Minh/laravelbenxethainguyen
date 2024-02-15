<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addedhouse extends Model
{
    protected $fillable = [
        'house',
        'email',
    ];

    protected $table = 'addedhouse';
}
