@extends('master.admin')
@section('title','Chi tiết sản phẩm')

@section('main')

<div class="row">
    <div class="col-md-5">
        <img src="{{url('public/uploads/'.$product->image)}}" width="100%">
    </div>

    <div class="col-md-7">
        <h2>{{$product->name}}</h2>
        <h4>Giá gốc: {{number_format($product->price)}}đ
            Giá KM: {{number_format($product->sale_price)}}đ
        </h4>
        <h4>Mô tả</h4>
        <p>{{Str::words(strip_tags($product->description),50)}}</p>
    </div>
</div>



@stop()


