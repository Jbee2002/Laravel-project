@extends('master.site')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <h2>Chi tiết đơn hàng</h2>
        <ul>
            <li>Trang chủ</li>
            <li>Đơn hàng</li>
            <li class="active">Chi tiết đơn hàng</li>
        </ul>
    </div>
</div>
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="cart__total">
                    <div class="col-12">
                        <div class="cart__total__content">
                            <h3>Thông tin liên hệ</h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Họ tên:</th>
                                        <td>{{$order->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{$order->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại:</th>
                                        <td>{{$order->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ:</th>
                                        <td>{{$order->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng số lượng</th>
                                        <td class="final-price">{{$quantity}}</td>
                                    </tr>
                                    <tr>
                                        <th>Thành tiền</th>
                                        <td class="final-price">{{$amount}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="cart">
                    <div class="container">
                        <div class="cart__table">
                            <div class="cart__table__wrapper">
                                <table>
                                    <colgroup>
                                        <col style="width: 40%" />
                                        <col style="width: 17%" />
                                        <col style="width: 17%" />
                                        <col style="width: 17%" />
                                        <col style="width: 9%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order_details as $otd)
                                        <tr>
                                            <td>
                                                <div class="cart-product">
                                                    <div class="cart-product__image"><img src="{{url('public/uploads/'.$otd->pro->image)}}" alt="Product image" />
                                                    </div>
                                                    <div class="cart-product__content">
                                                        <a href="{{ route('home.product',['product'=>$otd->pro->id,'slug'=>Str::slug($otd->pro->name)]) }}">{{$otd->pro->name}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$otd->price}}</td>
                                            <td>{{$otd->quantity}}</td>
                                            <td>{{$otd->quantity*$otd->price}}</td>
                                        </tr>
                                        @endforeach
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
<div class="instagram-two">
    <div class="instagram-two-slider">
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/1.png" alt="Instagram image" /></a>
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/2.png" alt="Instagram image" /></a>
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/3.png" alt="Instagram image" /></a>
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/4.png" alt="Instagram image" /></a>
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/5.png" alt="Instagram image" /></a>
        <a class="slider-item" href="https://www.instagram.com/"><img src="{{url('public/images')}}/6.png" alt="Instagram image" /></a>
    </div>
</div>



@stop()