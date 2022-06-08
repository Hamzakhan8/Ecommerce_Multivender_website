<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded=[];
    public function likes()
    {
    	return $this->hasMany('App\Like');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    } 

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
