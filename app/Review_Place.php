<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review_Place extends Model
{
    protected $table = 'review_place';
    protected $fillable = [
        'user_id',
        'place_id',
        'review_image',
        'approved'
    ];
}
