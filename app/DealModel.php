<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealModel extends Model
{
    //
    public $table = "deals";
    public $fillable = ['stores_id','title','description','extra_description','code','deals_link','date_add'];
    public $timestamps = false;
}
