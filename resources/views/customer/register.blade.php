@extends('master.site')

@section('content')

<div id="content">
    <div class="breadcrumb">
        <div class="container">
            <h2>Đăng ký</h2>
            <ul>
                <li>Trang chủ</li>
                <li class="active">Đăng ký</li>
            </ul>
        </div>
    </div>
    <div class="cta -style-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <div class="cta__form">
                        <form class="cta__form__detail validated-form" action="" method="POST" role="form">
                            @csrf
                            <div class="input-validator">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="your-email@gmail.com" name="email">
                                @error('email')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                                @error('password')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="comfirm_password">
                                @error('comfirm_password')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Họ và Tên</label>
                                <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="name">
                                @error('name')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="012345678" name="phone">
                                @error('phone')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="" name="address">
                                @error('address')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn -light-red">Đăng ký
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()