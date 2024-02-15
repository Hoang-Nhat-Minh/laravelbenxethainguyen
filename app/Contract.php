<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id',
        'contract'
    ];

    protected $table = 'contract';

    // Thêm phương thức user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
