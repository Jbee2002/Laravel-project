<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Banner;
use App\Http\Requests\Customer\CustomerLoginRequest as ReqLogin;
use App\Http\Requests\Customer\CustomerRegisterRequest as ReqRegister;

class HomeController extends Controller
{
    public function home()
    {
        $productSale = Product::orderBy('id', 'DESC')->limit(8)->get();
        $banner = Banner::orderBy('id', 'DESC')->limit(4)->get();
        return view('home', compact('productSale','banner'));
    }

    public function category(Category $category,Request $req)
    {
        $products = $category->products()->paginate(4);
        $order = $req->get('order');
        if ($order == 'price-asc') {
            $products = Product::price_asc()->paginate(4);
        }
        elseif ($order == 'price-desc') {
            $products = Product::price_desc()->paginate(4);
        }
        elseif ($order == 'name-asc') {
            $products = Product::name_asc()->paginate(4);
        }
        elseif ($order == 'name-desc') {
            $products = Product::name_desc()->paginate(4);
        }
        elseif ($order == 'new') {
            $products = Product::new_product()->paginate(4);
        }
        elseif ($order == 'old') {
            $products = Product::old_product()->paginate(4);
        }
        return view('category', compact('products','category'));
    }
    public function product(Product $product)
    {
        $same_category = Product::where('category_id', '=', $product->category_id)->where('id', '!=', $product->id)->limit(6)->get();
        return view('product', compact('product','same_category'));
    }

    public function shop(Request $req){
        $products = Product::search()->paginate(4);
        $order = $req->get('order');
        if ($order == 'price-asc') {
            $products = Product::price_asc()->paginate(4);
        }
        elseif ($order == 'price-desc') {
            $products = Product::price_desc()->paginate(4);
        }
        elseif ($order == 'name-asc') {
            $products = Product::name_asc()->paginate(4);
        }
        elseif ($order == 'name-desc') {
            $products = Product::name_desc()->paginate(4);
        }
        elseif ($order == 'new') {
            $products = Product::new_product()->paginate(4);
        }
        elseif ($order == 'old') {
            $products = Product::old_product()->paginate(4);
        }

        return view('shop', compact('products'));
    }

    public function product_search(){
        $products = Product::search()->paginate(4);
        return view('shop', compact('products'));
    }

    public function register()
    {
        return view('customer.register');
    }

    public function post_register(ReqRegister $req)
    {
        $data = $req->only('name', 'email', 'phone', 'address');
        $data['password'] = bcrypt($req->password);
        if (Customer::create($data)) {
            return redirect()->route('home.login');
        } else {
            return redirect()->back();
        }
    }

    public function login(){
        return view('customer.login');
    }

    public function post_login(ReqLogin $req){
        $data = $req->only('email','password');
        $check = auth()->guard('customer')->attempt($data);
        if($check){
            return redirect()->route('home');
        }
        return redirect()->back()->with('no','Email hoặc mật khẩu không chính xác');


    }

    public function logout() {
        auth()->guard('customer')->logout();
        return redirect()->route('home.login');
    }

    public function favorite($id){
        Favorite::create([
            'product_id' => $id,
            'customer_id' => auth()->guard('customer')->user()->id
        ]);
        return redirect()->route('home.product_favorite');

    }

    public function favorites_list() {
        $products = auth()->guard('customer')->user()->favorites;
        return view('favorites_list',compact('products'));
    }

    public function unfavorite($id){
        Favorite::where([
            'product_id' => $id,
            'customer_id' => auth()->guard('customer')->user()->id
        ])->delete();
        return redirect()->route('home.product_favorite');

    }

    public function order_history(){
        $orders = Order::order_history()->paginate(4);
        return view('order_history', compact('orders'));
    }

    public function order_details($id){
        $c_id = auth()->guard('customer')->user()->id;
        $order_details = OrderDetail::order_details($id)->get();
        $order = Order::order_info($c_id);
        $quantity=OrderDetail::totalQuantity($id);
        $amount=OrderDetail::totalAmount($id);
        return view('order_details',compact('order_details','order','amount','quantity'));
    }
}
