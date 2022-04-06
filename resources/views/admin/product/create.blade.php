@extends('master.admin')
@section('title','Thêm mới sản phẩm')
@section('main')


<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select name="category_id" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach


                </select>

            </div>

            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="">Giá KM</label>
                <input type="text" class="form-control" name="sale_price" placeholder="Input name">
            </div>

            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="upload" id="upload">
                <img src="" id="show_image" alt="" style="width:200px"/>
                @error('upload')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm mới</button>


        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Input name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="description" id="content" class="form-control" rows="3"  placeholder="Mô tả sản phẩm"></textarea>

            </div>

        </div>
    </div>
</form>


@stop()

@section('js')
<script>
    $('#upload').change(function(ev) {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    })
</script>


@stop()