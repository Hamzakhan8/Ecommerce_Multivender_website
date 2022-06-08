<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];
     public function seller()
    {
    	return $this->belongsTo('App\User','seller_id');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function buyer(){
    	return $this->belongsTo('App\User','buyer_id');
    }

}
