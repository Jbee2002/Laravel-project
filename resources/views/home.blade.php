@extends('master.site')
@section('content')
<div id="content">
    <div class="slider -style-1 slider-arrow-middle">
      <div class="slider__carousel">
        @foreach($banner as $ban)
        <div class="slider__carousel__item slider-1">
          <div class="container">
            <div class="slider-background"><img class="slider-background" src="{{url('public/uploads/'.$ban->image)}}" alt="Slider background" /></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="introduction-one">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6">
            <div class="introduction-one-image">
              <div class="introduction-one-image__detail"><img src="{{url('public/images')}}/img1.png" alt="background" /><img src="{{url('public/images')}}/img2.png" alt="background" /></div>
              <div class="introduction-one-image__background">
                <div class="background__item">
                  <div class="wrapper" ref="{bg1}"><img data-depth="0.5" src="{{url('public/images')}}/bg4.png" alt="background" /></div>
                </div>
                <div class="background__item">
                  <div class="wrapper" ref="{bg2}"><img data-depth="0.3" data-invert-x="" data-invert-y="" src="{{url('public/images')}}/bg5.png" alt="background" /></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="introduction-one-content">
              <h5>Giới thiệu về<span> ELIAH</span></h5>
              <div class="section-title " style="margin-bottom: 1.875em">
                <h2>Với Châm Ngôn</br> "When You Look Good </br> You Feel Good"</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p><a class="btn -white" href="#">Đặt lịch hẹn</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="introduction-two">
      <div class="video-frame" style="height: 500px; width: 888.889px;">
        <div class="video-frame__poster"><img src="{{url('public/images')}}/img3.png" alt="Video poster" /></div><a class="btn -white -round" href="#" style="height: 50px; width: 50px; line-height: 50px; padding: 0px;"><i class="fas fa-play"></i></a>
      </div>
      <div class="introduction-two-content">
        <div class="container">
          <div class="introduction-two-content__item active" data-cover="{{url('public/images')}}/img3.png" data-src="https://www.youtube.com/embed/80e0QHPYRG4"><span>01</span><a href="#">Chăm sóc da</a></div>
          <div class="introduction-two-content__item" data-cover="assets/images/introduction/IntroductionTwo/2.png" data-src="https://www.youtube.com/embed/xn7jfVWWSio"><span>02</span><a href="#">Trang điểm</a></div>
          <div class="introduction-two-content__item" data-cover="assets/images/introduction/IntroductionTwo/3.png" data-src="https://www.youtube.com/embed/K3M-czGNUCg"><span>03</span><a href="#">Nails</a></div>
          <div class="introduction-two-content__item" data-cover="assets/images/introduction/IntroductionTwo/4.png" data-src="https://www.youtube.com/embed/hoPiGLf0ICA"><span>04</span><a href="#">Chăm sóc tóc</a></div>
        </div>
      </div>
    </div>
    <div class="product-slide">
      <div class="container">
        <div class="section-title -center" style="margin-bottom: 1.875em">
          <h2>Sản phẩm mới</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
        </div>
        <div class="product-slider">
          <div class="product-slide__wrapper">
          <x-product-slide :data="$productSale"/>
          </div>
          <div class="text-center"><a class="btn -transparent -underline" href="{{route('home.shop')}}">Tất cả sản phẩm</a>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial">
      <div class="section-title -center" style="margin-bottom: 3.125rem">
        <h2>Mọi người nói gì về chúng tôi?</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
      </div>
      <div class="container">
        <div class="testimonial-slider">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="slide-nav">
                <div class="slide-nav__wrapper">
                  <div class="slide-nav__item" key="0"><img src="{{url('public/images')}}/cus1.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="1"><img src="{{url('public/images')}}/cus2.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="2"><img src="{{url('public/images')}}/cus3.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="3"><img src="{{url('public/images')}}/cus4.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="4"><img src="{{url('public/images')}}/cus5.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="5"><img src="{{url('public/images')}}/cus6.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="6"><img src="{{url('public/images')}}/cus7.png" alt="Customer avatar" /></div>
                  <div class="slide-nav__item" key="7"><img src="{{url('public/images')}}/cus8.png" alt="Customer avatar" /></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="slide-for">
                <div class="slide-for__wrapper">
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>VÕ Thị A</h3>
                        <h5>Hồ Chí Minh</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Nguyễn Thị E</h3>
                        <h5>Hà Nội</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Trần Thị L</h3>
                        <h5>Đà Nẵng</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?.</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Nguyễn Thị M</h3>
                        <h5>Hà Nội</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Phạm Thị Q</h3>
                        <h5>Nha Trang</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Nguyễn Thị D</h3>
                        <h5>Hồ Chí Minh</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Trần Thị B</h3>
                        <h5>Đà Nẵng</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                  <div class="slide-for__item">
                    <div class="slide-for__item__header">
                      <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                      <div class="customer__info">
                        <h3>Nguyễn Thị A</h3>
                        <h5>Hà Nội</h5>
                      </div>
                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    </div>
                    <p class="slide-for__item__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus voluptatem iusto exercitationem neque repellat nam tempora facilis repellendus consequuntur molestias culpa, et, veritatis ipsa provident expedita numquam reprehenderit ipsum?</p>
                  </div>
                </div>
                <div class="testimonial-one__slider-control"><a class="prev" href="#"><i class="far fa-angle-left"> </i>Trước</a><a class="next" href="#">Sau<i class="far fa-angle-right"> </i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team-one">
      <div class="container">
        <div class="section-title -center" style="margin-bottom: 1.875em">
          <h2>Đội ngũ chuyên gia</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
        </div>
        <div class="team-one-slider">
          <div class="slider__item">
            <div class="team-card">
              <div class="team-card__avatar"><img src="{{url('public/images')}}/pro1.png" alt="Danielle Welling" /></div>
              <div class="team-card__content">
                <h3>Danielle Welling</h3>
                <h5>Chuyên gia Nail</h5>
                <p>Ipsum dolor amet, consectetur adipiscing sedo lacus facilisis.</p>
                <socialicons></socialicons>
              </div>
            </div>
          </div>
          <div class="slider__item">
            <div class="team-card">
              <div class="team-card__avatar"><img src="{{url('public/images')}}/pro2.png" alt="Cali Lees" /></div>
              <div class="team-card__content">
                <h3>Cali Lees</h3>
                <h5>Chuyên gia trang điểm</h5>
                <p>Ipsum dolor amet, consectetur adipiscing sedo lacus facilisis.</p>
                <socialicons></socialicons>
              </div>
            </div>
          </div>
          <div class="slider__item">
            <div class="team-card">
              <div class="team-card__avatar"><img src="{{url('public/images')}}/pro3.png" alt="Danielle Welling" /></div>
              <div class="team-card__content">
                <h3>Danielle Welling</h3>
                <h5>Chuyên gia tạo kiểu tóc</h5>
                <p>Ipsum dolor amet, consectetur adipiscing sedo lacus facilisis.</p>
                <socialicons></socialicons>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cta -style-1" style="background-image: url(_assets/images/cta/CTAOne/1.html)">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 mx-auto">
            <div class="cta__form">
              <div class="section-title " style="margin-bottom: 1.875em">
                <h2>Đặt dịch vụ</h2><img src="{{url('public/images')}}/content-deco.png" alt="Decoration" />
              </div>
              <form class="cta__form__detail validated-form" action="#">
                <div class="input-validator">
                  <input type="text" placeholder="Your name" name="name" required="required" />
                </div>
                <div class="input-validator">
                  <input type="text" placeholder="Your phone" name="phone" required="required" />
                </div>
                <div class="input-validator">
                  <select class="customed-select required" name="service">
                    <option value="" hidden="hidden">Chọn dịch vụ</option>
                    <option value="Spa">Spa</option>
                    <option value="Salon">Salon</option>
                    <option value="Nail">Nail</option>
                  </select>
                </div>
                <div class="input-validator">
                  <select class="customed-select required" name="date">
                    <option value="" hidden="hidden">Chọn ngày</option>
                    <option value="Today">Hôm nay</option>
                    <option value="Tomorow">Ngày mai</option>
                  </select>
                </div>
                <button class="btn -light-red">Đặt lịch hẹn
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@stop()


