@extends('master.site')

@section('content')

<div id="content">
    <div class="breadcrumb">
        <div class="container">
            <h2>Đăng nhập</h2>
            <ul>
                <li>Trang chủ</li>
                <li class="active">Đăng nhập</li>
            </ul>
        </div>
    </div>
    @if(Session::has('no'))
    <div style = "text-align : center;">
        <strong>{{Session::get('no')}}</strong>
    </div>
    @endif


    <div class="cta -style-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <div class="cta__form">
                        <form class="cta__form__detail validated-form" action="" method="POST" role="form">
                            @csrf
                            <div class="input-validator">
                                <label for="">Email</label>
                                <input type="email" placeholder="Your email" name="email" />
                                @error('email')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-validator">
                                <label for="">Mật khẩu</label>
                                <input type="password" placeholder="Your Password" name="password" />
                                @error('password')
                                <small class="help-block">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn -light-red">Đăng Nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()