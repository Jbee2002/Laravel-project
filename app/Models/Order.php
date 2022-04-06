<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','created_at','name','email','address','phone','status'];
    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    
    public static function order_history(){
        $order = Order::where(['customer_id' => auth()->guard('customer')->user()->id]);
        return $order;
    }

    public static function order_info($id){
        $order_info = Order::where(['id'=>$id])->first();
        return $order_info;
    }


}
