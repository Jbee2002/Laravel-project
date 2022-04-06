@extends('master.admin')
@section('title','Thêm mới sản phẩm')
@section('main')


<form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="upload" id="upload">
        <img src="" id="show_image" alt="" style="width:200px" />
        @error('upload')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>

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