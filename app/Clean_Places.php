<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clean_Places extends Model
{
    protected $table = 'cleaned_places';
    protected $fillable = [
        'user_id',
        'place_id'
    ];
}
