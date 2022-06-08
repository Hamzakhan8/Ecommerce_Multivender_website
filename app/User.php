<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country','city', 'address','contact','cnic', 'role','company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function sellerOrders()
    {
        return $this->hasMany('App\Order','seller_id');
    }
    public function buyerOrders()
    {
        return $this->hasMany('App\Order','buyer_id');
    }

    public function article()
    {
        return $this->hasOne('App\Article');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function isNotAdmin()
    {
        //if he user id is 1 the home page will be displayed else not be displayed

        // ye middle ware k liye me ne banaya hain l agar user ki id 1 na ho to article index kaam nahi karey g 
        // yaha  se value middle ware ko return ho g 
        
        if(auth()->user()->id == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


