<div class="shop">
    <div class="container-full-half">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                <div class="shop-sidebar">
                    <div class="shop-sidebar__content">
                        <div class="shop-sidebar__section -categories">
                            <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
                                <h2>Sản phẩm</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
                            </div>
                            <ul>
                                <li><a href="{{route('home.shop')}}">Tất cả</a></li>
                                @foreach($categories as $cat)
                                <li><a href="{{route('home.category',['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                <div class="shop-header">
                    <form method="get" action="" role="form" class="form-inline">
                        <div class="form-group">
                            <select class="customed-select" name="order">
                                <option value="new">Mới</option>
                                <option value="old">Cũ</option>
                                <option value="name-asc">Tên A to Z</option>
                                <option value="name-desc">Tên Z to A</option>
                                <option value="price-asc" name="low">Giá thấp đến cao</option>
                                <option value="price-desc">Giá cao đến thấp</option>
                            </select>
                        </div>
                        <button type="submit">Lọc</button>
                    </form>
                </div>
                <div class="shop-products">
                    <div class="shop-products__gird">
                        <div class="row mx-n1 mx-xl-n3">
                            @foreach ($data as $pro)
                            <div class="col-6 col-lg-4 col-xl-3 px-1 px-xl-3">
                                <div class="product ">
                                    <div class="product-type"></div>
                                    <div class="product-thumb"><a class="product-thumb__image" href="{{ route('home.product',['product'=>$pro->id,'slug'=>Str::slug($pro->name)]) }}"><img src="{{url('public/uploads/'.$pro->image)}}" alt="Product image" /></a>
                                        <div class="product-thumb__actions">
                                            <div class="product-btn"><a class="btn -white product__actions__item -round product-atc" href="{{route('cart.add',$pro->id)}}"><i class="fas fa-shopping-bag"></i></a>
                                            </div>
                                            <div class="product-btn"><a class="btn -white product__actions__item -round product-qv" href="#"><i class="fas fa-eye"></i></a>
                                            </div>
                                            <div class="product-btn">
                                                <!-- <a class="btn -white product__actions__item -round" href="{{route('home.login')}}"><i class="fas fa-heart"></i></a> -->

                                                @if(auth()->guard('customer')->check())
                                                @if(auth()->guard('customer')->user()->isFavorited($pro->id))
                                                <a class="btn -white product__actions__item -round" href="{{route('home.unfavorite',$pro->id)}}"><i class="fas fa-heart" style="color:red;"></i></a>
                                                @else
                                                <a class="btn -white product__actions__item -round" href="{{route('home.favorite',$pro->id)}}"><i class="fas fa-heart"></i></a>
                                                @endif
                                                @else
                                                <a class="btn -white product__actions__item -round" href="{{route('home.login')}}"><i class="fas fa-heart"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-content__header">
                                            <div class="product-category">{{$pro->cat->name}}</div>
                                            <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        </div><a class="product-name" href="{{ route('home.product',['product'=>$pro->id,'slug'=>Str::slug($pro->name)]) }}">{{$pro->name}}</a>
                                        <div class="product-content__footer">
                                            <h5 class="product-price--main">{{$pro->price}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="paginator">
                            {{$data->appends(request()->all())->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>