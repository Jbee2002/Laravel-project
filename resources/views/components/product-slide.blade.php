@foreach ($data as $pro)
<div class="product-slide__item">
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