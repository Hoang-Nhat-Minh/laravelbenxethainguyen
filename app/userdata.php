<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdata extends Model
{
    protected $fillable = [
        'surname',
        'profileName',
        'phone',
        'birthday',
        'address',
        'email',
        'avatar',
        'checksubmit',
        'user_id'
    ];

    protected $table = 'userdata';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
