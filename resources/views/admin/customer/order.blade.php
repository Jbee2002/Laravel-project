@extends('master.admin')
@section('title','Danh sách đơn hàng')
@section('main')

<form action="" method="GET" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="text" class="form-control" name="key" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Sđt</th>
            <th>Địa chỉ</th>
            <th>Ngày đặt</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $od)
        <tr>
            <td>{{$od->id}}</td>
            <td>{{$od->name}}</td>
            <td>{{$od->email}}</td>
            <td>{{$od->phone}}</td>
            <td>{{$od->address}}</td>
            <td>{{$od->created_at}}</td>
            <td>

                <a href="{{route('order_detail',$od->id)}}" class="btn btn-primary btn-sm">Chi tiết</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</hr>
{{$orders->appends(request()->all())->links()}}


@stop()