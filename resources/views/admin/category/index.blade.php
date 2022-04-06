@extends('master.admin')
@section('title','Danh mục')
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
    <a href="{{route('category.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="{{route('category.trashed')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Thùng rác</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>
                @if($cat->status==1)
                <span class="label label-success">Hiển thị</span>
                @else
                <span class="label label-danger">Ẩn</span>
                @endif

            </td>
            <td>

                <form action="{{ route('category.destroy',$cat->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('category.edit',$cat->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i></button>


                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</hr>
{{$cats->appends(request()->all())->links()}}


@stop()