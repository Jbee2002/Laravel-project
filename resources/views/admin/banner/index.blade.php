@extends('master.admin')
@section('title','Danh sách Banner')
@section('main')


<a href="{{route('banner.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Ảnh</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $ban)
        <tr>
            <td>{{$ban->id}}</td>
            <td>
                <img src="{{url('public/uploads/'.$ban->image)}}" width="60">
            </td>
            <td>
                <form action="{{ route('banner.destroy',$ban->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</hr>
{{$banners->links()}}


@stop()