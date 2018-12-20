<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	public $timestamps = false;
    protected $fillable = ['store_name','description','more_about_cms','description_sidebar','store_image','side_bar_image','status'];

}
