<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = [
        'user_id','Email', 'Comment','image','rating','blocked','user_name'
    ];
}
