@extends('master.admin')
@section('title','Danh sách đơn hàng')
@section('main')


<div class="row">
    <div class="col-md-6">
        <a href="{{route('no_account')}}" class="btn btn-primary"> Đơn hàng chưa đăng ký</a>
        <a href="{{route('have_account')}}" class="btn btn-success"> Đơn hàng đã đăng ký</a>
    </div>
    <div class="col-md-6">
        <form action="" method="GET" class="form-inline " role="form">

            <div class="form-group">
                <label for="">Từ</label>
                <input type="date" class="form-control" id="" placeholder="Input field" name='before'> 
            </div>
            <div class="form-group">
                <label for="">Đến</label>
                <input type="date" class="form-control" id="" placeholder="Input field" name="after">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<hr>







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