<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name'];
    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public function subcategories()
    {
    	return $this->hasMany('App\Subcategory');
    }
}
