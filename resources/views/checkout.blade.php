@extends('master.site')
@section('content')
<div id="content">
    <div class="breadcrumb">
        <div class="container">
            <h2>Thanh toán</h2>
            <ul>
                <li>Trang chủ</li>
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
    @if($cart->totalQuantity > 0)
    <div class="shop">
        <div class="container">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <form action="" method="POST" role="form">
                                @csrf
                                <div class="checkout__form">
                                    <div class="checkout__form__contact">
                                        <div class="checkout__form__contact__title">
                                            <h5 class="checkout-title">Thông tin liên hệ</h5>
                                        </div>
                                    </div>
                                    <div class="checkout__form__shipping">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-validator">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" />
                                                    @error('email')
                                                    <small class="help-block">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-validator">
                                                    <label>Họ và tên<span>*</span>
                                                        <input type="text" name="name" />
                                                    </label>
                                                    @error('name')
                                                    <small class="help-block">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-validator">
                                                    <label>Số điện thoại<span>*</span>
                                                        <input type="text" name="phone">
                                                    </label>
                                                    @error('phone')
                                                    <small class="help-block">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-validator">
                                                    <label>Địa chỉ <span>*</span>
                                                        <input type="text" name="address" placeholder="Steet address" />
                                                    </label>
                                                    @error('address')
                                                    <small class="help-block">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn -red" name="redirect">Đặt hàng
                                </button>
                            </form>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 ml-auto">
                                    <div class="checkout__total">
                                        <h5 class="checkout-title">Đơn hàng</h5>
                                        <div class="checkout__total__price">
                                            <h5>Sản phẩm</h5>
                                            <table>
                                                <colgroup>
                                                    <col style="width: 70%" />
                                                    <col style="width: 30%" />
                                                </colgroup>
                                                <tbody>
                                                    @foreach($cart->items as $item)
                                                    <tr>
                                                        <td><span>{{$item->quantity}} x </span>{{$item->name}}
                                                        </td>
                                                        <td>{{$item->price}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="checkout__total__price__total-count">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tổng tiền</td>
                                                            <td>{{$cart->totalAmount}} đ</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="cart__table__footer container"><a href="{{route('home')}}"><i class="fal fa-long-arrow-left"></i>Tiếp tục mua hàng</a></div>
    @endif

    @stop()