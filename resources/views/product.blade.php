@extends('master.site')
@section('content')
<!-- <div class="row">
    <div class="col-md-5">
        <img src="{{url('public/uploads/'.$product->image)}}" width="100%">
    </div>

    <div class="col-md-7">
        <h2>{{$product->name}}</h2>
        <h4>Giá gốc: {{number_format($product->price)}}đ
            Giá KM: {{number_format($product->sale_price)}}đ
        </h4>
        <h4>Mô tả</h4>
        <p>{{Str::words(strip_tags($product->description),50)}}</p>
    </div>
</div> -->

<div id="content">
    <div class="breadcrumb">
        <div class="container">
            <h2>Sản phẩm</h2>
            <ul>
                <li>Trang chủ</li>
                <li>Sản phẩm</li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
    <div class="shop">
        <div class="container">
            <div class="product-detail__wrapper">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="product-detail__slide-two">
                            <div class="product-detail__slide-two__big">
                                <div class="slider__item"><img src="{{url('public/uploads/'.$product->image)}}" alt="Product image" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-detail__content">
                            <div class="product-detail__content">
                                <div class="product-detail__content__header">
                                    <h5>{{$product->cat->name}}</h5>
                                    <h2>{{$product->name}}</h2>
                                </div>
                                <div class="product-detail__content__header__comment-block">
                                    <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                    <p>03 Đánh giá</p><a href="#">Viết đánh giá</a>
                                </div>
                                <h3>{{$product->price}}</h3>
                                <div class="divider"></div>
                                <div class="product-detail__content__footer">
                                    <div class="product-detail__controller">
                                        <div class="quantity-controller -border -round">
                                            <td>
                                                <form action="{{route('cart.add',$product->id)}}" method="GET" class="form-inline" role="form">

                                                    <div class="form-group">
                                                        <input class="form-control" name="quantity">
                                                    </div>


                                                    <div class="add-to-cart -dark">
                                                    <button type="submit" class="btn -round -red"><i class="fas fa-shopping-bag"></i></button>
                                                    <h5>Thêm vào giỏ hàng</h5>
                                                    </div>
                                                </form>
                                            </td>
                                        </div>
                                        <div class="product-detail__controler__actions"></div>
                                        @if(auth()->guard('customer')->check())
                                        @if(auth()->guard('customer')->user()->isFavorited($product->id))
                                        <a class="btn -white product__actions__item -round" href="{{route('home.unfavorite',$product->id)}}"><i class="fas fa-heart" style="color:red;"></i></a>
                                        @else
                                        <a class="btn -white product__actions__item -round" href="{{route('home.favorite',$product->id)}}"><i class="fas fa-heart"></i></a>
                                        @endif
                                        @else
                                        <a class="btn -white product__actions__item -round" href="{{route('home.login')}}"><i class="fas fa-heart"></i></a>
                                        @endif
                                    </div>
                                    <div class="divider"></div>
                                    <div class="product-detail__content__tab">
                                        <ul class="tab-content__header">
                                            <li class="tab-switcher" data-tab-index="0" tabindex="0">Mô tả</li>
                                            <li class="tab-switcher" data-tab-index="1" tabindex="0">Vận chuyển</li>
                                            <li class="tab-switcher" data-tab-index="2" tabindex="0">Đánh giá ( 03 )</li>
                                        </ul>
                                        <div id="allTabsContainer">
                                            <div class="tab-content__item -description" data-tab-index="0">
                                                <p>{!!$product->description!!}</p>
                                            </div>
                                            <div class="tab-content__item -ship" data-tab-index="1" style="display:none;">
                                                <h5><span>Vận chuyển</span>Hà Nội</h5>
                                                <ul>
                                                    <li>0kg - 5kg. <span>+10000 đ</span></li>
                                                    <li>5kg-10kg . <span>+20000 đ</span></li>
                                                </ul>
                                            </div>
                                            <div class="tab-content__item -review" data-tab-index="2" style="display:none;">
                                                <div class="review">
                                                    <div class="review__header">
                                                        <div class="review__header__avatar"><img src="../../../i1.wp.com/metro.co.uk/wp-content/uploads/2020/03/GettyImages-1211127989bb31.jpg?quality=90&amp;strip=all&amp;zoom=1&amp;resize=644%2C416&amp;ssl=1" alt="Reviewer avatar" /></div>
                                                        <div class="review__header__info">
                                                            <h5>Nguyên văn A</h5>
                                                            <p>17 Tháng 3, 2020</p>
                                                        </div>
                                                        <div class="review__header__rate">
                                                            <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                                        </div>
                                                    </div>
                                                    <p class="review__content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p><a class="review__report" href="#">Report as Inappropriate</a>
                                                </div>
                                                <form>
                                                    <h5>Viết đánh giá</h5>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="input-validator">
                                                                <input type="text" name="name" placeholder="Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="input-validator">
                                                                <input type="text" name="email" placeholder="Email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="input-validator">
                                                                <textarea name="message" placeholder="Message" rows="5"></textarea>
                                                            </div><span class="input-error"></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="btn -dark">Đánh giá
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
    <div class="product-slide">
        <div class="container">
            <div class="section-title -center" style="margin-bottom: 1.875em">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="product-slider">
                <div class="product-slide__wrapper">
                    <x-product-slide :data="$same_category" />
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