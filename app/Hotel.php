<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = [
        'Hotel_Name', 'Address', 'Contact_No','Link','Description','Main_logo','user_id','facebook','instagram','Cover_photo'
    ];
}
