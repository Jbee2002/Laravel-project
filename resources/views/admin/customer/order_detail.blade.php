@extends('master.admin')
@section('title','Chi tiết đơn hàng')
@section('main')

<div class="row">
    <div class="col-md-6">
        <div>
            <p>
                <strong>Tên khách hàng: </strong>{{$order->name}}
            </p>
            <p>
                <strong>Email:</strong> {{$order->email}}
            </p>
            <p>
                <strong>Số điện thoại:</strong> {{$order->phone}}
            </p>
            <p>
                <strong>Địa chỉ:</strong> {{$order->address}}
            </p>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Tổng số lượng: {{$quantity}}</h4> 
        <h4>Tổng tiền: {{$amount}}</h4> 
    </div>
</div>


<hr>





<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1; ?>
        @foreach($order_details as $otd)
        <tr>
            <td>{{$n}}</td>
            <td>
                <img src="{{url('public/uploads/'.$otd->pro->image)}}" width="60">
            </td>
            <td>{{$otd->pro->name}}</td>
            <td>{{$otd->quantity}}</td>
            <td>{{$otd->pro->price}}/{{$otd->pro->sale_price}}</td>
            <td>{{$otd->price}}</td>
        </tr>
        <?php $n++; ?>
        @endforeach
    </tbody>
</table>
{{$order_details->appends(request()->all())->links()}}

@stop()