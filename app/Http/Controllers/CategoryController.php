<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CategoryStoreRequest as ReqStore;
use App\Http\Requests\Category\CategoryUpdateRequest as ReqUpdate;

class CategoryController extends Controller
{

    public function index(Request $req)
    {
        $cats = Category::search()->paginate(4);
        return view('admin.category.index', compact('cats'));
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(ReqStore $req, Category $category)
    {

        $category->add();
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        if($category->products->count() > 0){
            return redirect()->route('category.index')->with('no','Danh mục đang tồn tại sản phẩm');
        }
        $category->delete();
        return redirect()->route('category.index')->with('yes','Xóa danh mục thành công');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(ReqUpdate $req, Category $category)
    {
        $category->updateCategory();
        return redirect()->route('category.index');
    }

    public function trashed(){
        $category = Category::search()->onlyTrashed()->paginate(2);
        return view('admin.category.trashed', compact('category'));
    }

    public function restore($id){
        $category = Category::withTrashed()->find($id);
        $category -> restore();
        return redirect()->route('category.index');
        
    }
    public function forceDelete($id){
        $category = Category::withTrashed()->find($id);
        $category -> forceDelete();
        return redirect()->route('category.index')->with('yes','Danh mục đã được xóa vĩnh viễn');
        
    }
}
