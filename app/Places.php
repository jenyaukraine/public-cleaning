<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'name',
        'country',
        'geo',
        'image',
        'state'
    ];
}
