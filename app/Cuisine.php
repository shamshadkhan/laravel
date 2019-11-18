<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = [
    	'title','price','discount_amount','discount','image'
    ];
}
