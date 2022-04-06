@extends('master.admin')
@section('title','Danh sách sản phẩm')
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

            <form action="{{ route('product.forceDelete',$pro->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('product.restore',$pro->id) }}" class="btn btn-success btn-sm"><i class="fa fa-undo"></i></a>
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