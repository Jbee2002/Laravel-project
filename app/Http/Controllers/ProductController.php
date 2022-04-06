<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\ProductStoreRequest as ReqStore;
use App\Http\Requests\Product\ProductUpdateRequest as ReqUpdate;


class ProductController extends Controller
{
    public function index(Request $req)
    {
        $products = Product::paginate(4);
        if ($req->key) {
            $key = $req->key;
            $products = Product::where('name', 'like', '%' . $key . '%')->paginate(4);
        }
        return view('admin.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function create()
    {
        $cats = Category::orderBy('name', 'asc')->get();
        return view('admin.product.create', compact('cats'));
    }

    public function store(ReqStore $req)
    {
        $ext = $req->upload->extension();
        $file_name = time() . '.' . $ext;
        $req->upload->move(public_path('uploads'), $file_name);
        $data = $req->only('name', 'price', 'sale_price', 'category_id', 'description');
        $data['image'] = $file_name;
        Product::create($data);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        if($product->order_details->count() > 0){
            return redirect()->route('product.index')->with('no','Sản phẩm tồn tại chi tiết đơn hàng');
        }
        $product->delete();
        return redirect()->route('product.index')->with('yes','Xóa sản phẩm thành công');
    }

    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'asc')->get();
        return view('admin.product.edit', compact('product', 'cats'));
    }



    public function update(Request $req, Product $product)
    {
        $req->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'category_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'upload' => [
                'mimes:jpeg,jpg,png,gif,bmp'
            ]

        ], [
            'name.required' => 'Tên sản phẩm không để trống',
            'name.unique' => 'Tên sản phẩm đã được sử dụng',

            'upload.mimes' => 'Định dạng File không hợp lệ',

            'category_id.required' => 'Danh mục không để trống',
            'price.required' => 'Giá sản phẩm không để trống'

        ]);
        $data = $req->only('name', 'price', 'sale_price', 'category_id', 'description');
        if ($req->has('upload')) {
            $ext = $req->upload->extension();
            $file_name = time() . '.' . $ext;
            $req->upload->move(public_path('uploads'), $file_name);
            $data['image'] = $file_name;
        }
        //   dd($data);
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function trashed(){
        $products = Product::search()->onlyTrashed()->paginate(2);
        return view('admin.product.trashed', compact('products'));
    }

    public function restore($id){
        $product = Product::withTrashed()->find($id);
        $product -> restore();
        return redirect()->route('product.index');
        
    }
    public function forceDelete($id){
        $product = Product::withTrashed()->find($id);
        $product -> forceDelete();
        return redirect()->route('product.index')->with('yes','Sản phẩm đã được xóa vĩnh viễn');
        
    }
}
