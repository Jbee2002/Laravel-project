<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avitex.vn/theme/eliah/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 10:35:22 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Homepage 1</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;700;900&amp;display=swap" />
  <link rel="shortcut icon" type="image/png" href="assets/images/fav.png" />
  <!--build:css assets/css/styles.min.css-->
  <link rel="stylesheet" href="{{url('public/user')}}/css/bootstrap.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/css/slick.min.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/css/fontawesome.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/css/jquery.modal.min.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/css/bootstrap-drawer.min.css" />
  <link rel="stylesheet" href="{{url('public/user')}}/css/style.css" />
</head>

<body>
  <div class="header -one">
    <div class="top-nav -style-1">
      <div class="container">
        <div class="top-nav__wrapper">
          <div class="top-nav-social">
            <div class="social-icons -white">
              <ul>
                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/"><i class="fab fa-instagram"> </i></a></li>
                <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
          <p class="top-nav-promo">Miễn phí vận chuyện với đơn từ 1000000đ trở lên</p>
          <div class="top-nav-selections">
            <div class="top-nav-selections__item">
              <select class="customed-select -borderless -white" name="cur">
                <option value="USD">USD</option>
                <option value="JPY">JPY</option>
                <option value="VND">VND</option>
              </select>
            </div>
            <div class="top-nav-selections__item">
              <select class="customed-select -borderless -white" name="lang">
                <option value="EN">ENG</option>
                <option value="JP">JAP</option>
                <option value="VI">VIE</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu -style-1">
      <div class="container">
        <div class="menu__wrapper"><a class="menu-logo" href="index.html"><img src="{{url('public/images')}}/logo.png" alt="Logo" /></a>
          <div class="navigator ">
            <ul>
              <li class="relative"><a href="{{route('home')}}">Trang chủ</a></li>
              <li><a href="">Dịch vụ</a></li>
              <li><a href="">Giới thiệu</a></li>
              <li><a href="{{route('home.shop')}}">Sản phẩm<span class="dropable-icon"><i class="fas fa-angle-down"></i></span></a>
                <ul class="dropdown-menu -wide">
                  <ul class="dropdown-menu__col">
                    @foreach($categories as $cat)
                    <li><a class="dropdown-item" href="{{route('home.category',['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                    @endforeach
                  </ul>
                </ul>
              </li>
              <li><a href="">Blog</a></li>
              <li><a href="">Liên hệ</a></li>

              <li class="relative"><a href="#">Khách hàng<span class="dropable-icon"><i class="fas fa-angle-down"></i></span></a>
                <ul class="dropdown-menu">
                  @if(auth()->guard('customer')->check())
                  <li><a class="dropdown-item" href="">{{auth()->guard('customer')->user()->name}}</a></li>
                  <li><a class="dropdown-item" href="{{route('home.order_history')}}">Lịch sử</a></li>
                  <li><a class="dropdown-item" href="{{route('home.logout')}}">Thoát</a></li>
                  @else
                  <li><a class="dropdown-item" href="{{route('home.login')}}">Đăng nhập</a></li>
                  <li><a class="dropdown-item" href="{{route('home.register')}}">Đăng ký</a></li>
                  @endif
                </ul>
              </li>
            </ul>
          </div>
          <div class="menu-functions "><a class="menu-icon -search" href="#"><img src="{{url('public/images')}}/search-icon.png" alt="Search icon" /></a>
            <div class="search-box">
              <form action="" method="GET" role="form">
                <div class="form-group">
                  <input type="text" placeholder="What are you looking for?" name="key" />
                </div>
                <button type="submit"><img src="{{url('public/images')}}/search-icon.png" alt="Search icon" /></button>
              </form>
            </div>
            @if(auth()->guard('customer')->check())
            <a class="menu-icon -wishlist" href="{{route('home.product_favorite')}}"><img src="{{url('public/images')}}/wishlist-icon.png" alt="Wishlist icon" /></a>
            @else
            <a class="menu-icon -wishlist" href="{{route('home.login')}}"><img src="{{url('public/images')}}/wishlist-icon.png" alt="Wishlist icon" /></a>
            @endif
            <div class="menu-cart"><a class="menu-icon" href="{{route('cart.view')}}"><img src="{{url('public/images')}}/cart-icon.png" alt="Wishlist icon" /><span class="cart__quantity">{{$cart->totalQuantity}}</span></a>
              <h5><span>{{$cart->totalAmount}}đ</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      @yield('content')
    </div>

    <div class="footer-one">
      <div class="container">
        <div class="footer-one__header">
          <div class="footer-one__header__logo"><a href="https://avitex.vn/homepages/homepage1"><img src="{{url('public/images')}}/logo.png" alt="Logo" /></a></div>
          <div class="footer-one__header__newsletter"><span>Gửi thư:</span>
            <div class="footer-one-newsletter">
              <div class="subscribe-form">
                <div class="mc-form">
                  <input type="text" placeholder="Enter your email" />
                  <button class="btn "><i class="fas fa-paper-plane"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-one__header__social">
            <div class="social-icons -border">
              <ul>
                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/"><i class="fab fa-instagram"> </i></a></li>
                <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-one__body">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="footer__section -info">
                <h5 class="footer-title">Thông tin liên hệ</h5>
                <p>Địa chỉ:<span>238 Hoàng Quốc việt, Cầu Giấy, Hà Nội</span></p>
                <p>Điện Thoại:<span>+84 111-222-1999</span></p>
                <p>Email:<span>Beatycosmetics@gmail.com</span></p>
                <p>Mở cửa:<span>8.00am - 11.00.pm</span></p>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="footer__section -links">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <h5 class="footer-title">Tài khoản</h5>
                    <ul>
                      <li><a href="">Tài khoản</a></li>
                      <li><a href="">Yêu thích</a></li>
                      <li><a href="">Giỏ hàng</a></li>
                      <li><a href="">Sản phẩm</a></li>
                      <li><a href="">Thanh toán</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-sm-6">
                    <h5 class="footer-title">Thông tin</h5>
                    <ul>
                      <li><a href="about.html">Giới thiệu</a></li>
                      <li><a href="contact.html">Chăm sóc khách hàng</a></li>
                      <li><a href="contact.html">Thông tin vận chuyển</a></li>
                      <li><a href="contact.html">Chính sách bảo hành</a></li>
                      <li><a href="contact.html">Các điều khoản</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="footer__section -payment">
                <h5 class="footer-title">Phương thức thanh toán</h5>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit gravida facilisis.</p>
                <div class="payment-methods"><img src="{{url('public/images')}}/pay.png" alt="Payment methods" /></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-one__footer">
        <div class="container">
          <div class="footer-one__footer__wrapper">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--build:js assets/js/main.min.js-->
  <script src="{{url('public/user')}}/js/jquery-3.5.1.min.js"></script>
  <script src="{{url('public/user')}}/js/parallax.min.js"></script>
  <script src="{{url('public/user')}}/js/slick.min.js"></script>
  <script src="{{url('public/user')}}/js/jquery.validate.min.js"></script>
  <script src="{{url('public/user')}}/js/jquery.modal.min.js"></script>
  <script src="{{url('public/user')}}/js/bootstrap-drawer.min.js"></script>
  <script src="{{url('public/user')}}/js/jquery.countdown.min.js"></script>
  <script src="{{url('public/user')}}/js/main.min.js"></script>
  <!--endbuild-->
</body>

<!-- Mirrored from avitex.vn/theme/eliah/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 10:36:01 GMT -->

</html>