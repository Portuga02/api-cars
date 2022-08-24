<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CarsModel extends Model
{

    protected $table = 'listcars';

    protected $fillable = [
        'name',
        'description',
        'model',
        'date'
    ];
    protected $casts = [
        'date' => 'timestamp'
    ];

    public $timestamps = false;
}
