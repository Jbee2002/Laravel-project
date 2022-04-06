@extends('master.admin')
@section('title','Thêm mới danh mục')
@section('main')


<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Input name">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" checked>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="0">
                Tạm ẩn
            </label>
        </div>
        
    </div>

    

    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>


@stop()