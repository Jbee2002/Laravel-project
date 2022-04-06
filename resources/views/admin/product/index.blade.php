@extends('master.admin')
@section('title','Danh sách sản phẩm')
@section('main')

@if(Session::has('no'))

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{Session::get('no')}}</strong>
</div>
@endif
@if(Session::has('yes'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('yes')}}
</div>
@endif
<form action="" method="GET" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="text" class="form-control" name="key" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('product.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="{{route('product.trashed')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Thùng rác</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Tên danh mục</th>
            <th>Giá/Giá KM</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $pro)
        <tr>
            <td>{{$pro->id}}</td>
            <td>
            <img src="{{url('public/uploads/'.$pro->image)}}" width="60">
            </td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->cat->name}}</td>
            <td>{{$pro->price}}/{{$pro->sale_price}}</td>
            <td>

                <form action="{{ route('product.destroy',$pro->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('product.show',$pro->id) }}" class="btn btn-primary btn-sm">Chi tiết</a>
                    <a href="{{ route('product.edit',$pro->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i></button>


                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</hr>
{{$products->appends(request()->all())->links()}}


@stop()