<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'user_id',
        'rowonename',
        'rowonedate',
        'rowtwoname',
        'rowtwodate',
        'rowthreename',
        'rowthreedate',
        'rowfourname',
        'rowfourdate',
        'rowfivename',
        'rowfivedate',
        'rowsixname',
        'rowsixdate',
        'rowsevenname',
        'rowsevendate',
        'roweightname',
        'roweightdate',
        'rowninename',
        'rowninedate',
        'rowtenname',
        'rowtendate',
        'price',
        'date',
        'billcode',
    ];

    protected $table = 'bills';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
