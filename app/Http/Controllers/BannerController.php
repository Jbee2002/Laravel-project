<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\Banner\BannerStoreRequest as ReqStore;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::paginate(2);
        return view('admin.banner.index',compact('banners'));
    }

    public function create(){
        return view('admin.banner.create');
    }

    public function store(ReqStore $req){
        $ext = $req->upload->extension();
        $file_name = time() . '.' . $ext;
        $req->upload->move(public_path('uploads'), $file_name);
        $data['image'] = $file_name;
        Banner::create($data);
        return redirect()->route('banner.index');
    }

    public function destroy(Banner $banner){
        $banner->delete();
        return redirect()->route('banner.index');
    }
}
