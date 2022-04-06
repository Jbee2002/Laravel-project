@extends('master.site')
@section('content')
<div id="content">
  <div class="breadcrumb">
    <div class="container">
      <h2>Sản phẩm</h2>
      <ul>
        <li>Trang chủ</li>
        <li class="active">Sản phẩm</li>
      </ul>
    </div>
  </div>

  <x-product-list :data="$products" />
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