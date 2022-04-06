@extends('master.admin')
@section('title','Danh mục đã xóa')
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
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cat)
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

                <form action="{{ route('category.forceDelete',$cat->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('category.restore',$cat->id) }}" class="btn btn-success btn-sm"><i class="fa fa-undo"></i></a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i></button>


                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</hr>
{{$category->appends(request()->all())->links()}}


@stop()