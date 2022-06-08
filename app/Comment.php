<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['user_id', 'produc_id', 'comment'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
