<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'address','password'
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

    public function isFavorited($product_id){
        // if(auth()->guard('customer')->check()){
        //     $userId = auth()->guard('customer')->user()->id;
        //     $favorited = Favorite::where(['customer_id'=>$userId,'product_id'=>$product_id])->first();
        //     return $favorited;
        // }
        // return false;

        return $this->hasOne(Favorite::class,'customer_id','id')->where('product_id',$product_id)->first();

        return false;
    }

    public function favorites(){
        return $this->belongsToMany(Product::class,'favorites');
    }
}
