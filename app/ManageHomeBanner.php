<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageHomeBanner extends Model
{
	public $table = 'home_banner';
	public $timestamps = false;
	protected $fillable = ['title','description','extra_description','banner_type','status','banner_image'];
    //
}
