<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 
use App\Models\Order; 
use App\Models\OrderDetail; 
class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::paginate(2);
        return view('admin.customer.index',compact('customer'));
    }

    public function order_id($id){
        $orders = Order::where(['customer_id'=> $id])->paginate(2);
        return view('admin.customer.order',compact('orders'));
    }
    public function have_account(){
        $orders = Order::whereNotNull('customer_id')->paginate(2);
        return view('admin.customer.order_list',compact('orders'));
    }
    public function order_list(Request $req){
        $orders = Order::paginate(2);
        $before = $req->get('before');
        $after = $req->get('after');
        return view('admin.customer.order_list',compact('orders'));
    }
    public function order_details($id,Order $order){
        $order_details = OrderDetail::order_details($id)->paginate(2);
        $order = Order::order_info($id);
        $quantity=OrderDetail::totalQuantity($id);
        $amount=OrderDetail::totalAmount($id);
        return view('admin.customer.order_detail',compact('order_details','order','quantity','amount'));
    }
    public function no_account() {
        $orders = Order::where(['customer_id'=> NULL])->paginate(2);
        return view('admin.customer.order_list',compact('orders'));
    }
}
