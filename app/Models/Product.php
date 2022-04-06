<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table ='product';
    protected $fillable = ['name','price','sale_price','image','category_id','description'];
    protected $dates=['deleted_at'];
    public function cat(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }


    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public static function price_asc(){
        $low_price = Product::orderBy('price','ASC');
        return $low_price;
    }
    public static function price_desc(){
        $high_price = Product::orderBy('price','DESC');
        return $high_price;
    }
    public static function name_asc(){
        $name_asc = Product::orderBy('name','ASC');
        return $name_asc;
    }
    public static function name_desc(){
        $name_desc = Product::orderBy('name','DESC');
        return $name_desc;
    }
    public static function new_product(){
        $new = Product::orderBy('id','DESC');
        return $new;
    }
    public static function old_product(){
        $old = Product::orderBy('id','ASC');
        return $old;
    }
}
