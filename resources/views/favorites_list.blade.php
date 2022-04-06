@extends('master.site')
@section('content')

<div id="content">
    <div class="breadcrumb">
        <div class="container">
            <h2>Yêu thích</h2>
            <ul>
                <li>Trang chủ</li>
                <li class="active">Yêu thích</li>
            </ul>
        </div>
    </div>
    <div class="wishlist">
        <div class="container">
            <div class="wishlist__table">
                <div class="wishlist__table__wrapper">
                    <table>
                        <colgroup>
                            <col style="width: 40%" />
                            <col style="width: 20%" />
                            <col style="width: 20%" />
                            <col style="width: 20%" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $pro)
                            <tr>
                                <td>
                                    <div class="wishlist-product">
                                        <div class="wishlist-product__image"><img src="{{url('public/uploads/'.$pro->image)}}" alt="Velvet Melon High Intensity" /></div>
                                        <div class="wishlist-product__content">
                                            <h5>{{$pro->cat->name}}</h5><a href="{{ route('home.product',['product'=>$pro->id,'slug'=>Str::slug($pro->name)]) }}">{{$pro->name}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$pro->price}}</td>
                                <td><a class="btn -dark" href="{{route('cart.add',$pro->id)}}">Thêm vào giỏ hàng</a><a class="remove-btn" href="{{route('home.unfavorite',$pro->id)}}"><i class="fal fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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