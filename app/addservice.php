<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addservice extends Model
{
    protected $fillable = [
        'house',
        'email',
        'service_id',
    ];

    protected $table = 'addservice';

    // Thêm phương thức service
    public function service()
    {
        return $this->hasOne('App\Services', 'id', 'service_id');
    }
}
