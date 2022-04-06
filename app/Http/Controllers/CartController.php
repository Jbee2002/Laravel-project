<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use stdClass;
use App\Models\Cart;
use App\Http\Requests\Customer\CustomerCheckoutRequest as ReqCheckout;

class CartController extends Controller
{
    public function add(Cart $cart, $id)
    {
        $pro = Product::find($id);
        $quantity = request('quantity', 1);
        $cart->add($pro,$quantity);
        return redirect()->route('cart.view');
    }

    public function update(Cart $cart,$id)
    {
        $quantity = request('quantity', 1);
        $cart->update($id,$quantity);
        return redirect()->route('cart.view');
    }

    public function delete(Cart $cart,$id)
    {
        $cart->delete($id);
        return redirect()->route('cart.view');
    }

    public function clear()
    {
        session(['cart' => null]);
        return redirect()->route('cart.view');
    }


    public function view()
    {
        return view('cart');
    }

    public function form()
    {
        return view('checkout');
    }

    public function submit_form(ReqCheckout $req,Cart $cart)
    {
        if (Auth::guard('customer')->check()) {
            $c_id = Auth::guard('customer')->user()->id;
            if ($order = Order::create([
                'customer_id' => $c_id,
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'address' => $req->address
            ])) {
                $order_id = $order->id;
                foreach ($cart->items as $item) {
                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id' => $item->id,
                        'price' => $item->price,
                        'quantity' => $item->quantity
                    ]);
                }
                session(['cart' => null]);
                $amount=OrderDetail::totalAmount($order_id);
                PaymentContrller::vnpay_payment($order_id, $amount);
            }
        } else {
            if ($order = Order::create($req->only('name','email','address','phone'))) {
                $order_id = $order->id;
                foreach ($cart->items as $item) {
                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id' => $item->id,
                        'price' => $item->price,
                        'quantity' => $item->quantity
                    ]);
                }
                session(['cart' => null]);
                $amount=OrderDetail::totalAmount($order_id);
                PaymentContrller::vnpay_payment($order_id, $amount);
            }
        }
    }

    public function checkout_success()
    {
        return view('checkout_success');
    }
}
