@extends('layouts.master')

@section('content')
<div class="hero-wrap" style="background-image: url({{ asset('front/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-8 ftco-animate d-flex align-items-end">
            <div class="text w-100 text-center">
              <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span>.</h1>
              <p><a href="#" class="btn btn-primary py-2 px-4">Shop Now</a> <a href="#" class="btn btn-white btn-outline-white py-2 px-4">Read more</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-intro">
      <div class="container">
          <div class="row no-gutters">
              <div class="col-md-4 d-flex">
                  <div class="intro d-lg-flex w-100 ftco-animate">
                      <div class="icon">
                          <span class="flaticon-support"></span>
                      </div>
                      <div class="text">
                          <h2>Online Support 24/7</h2>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 d-flex">
                  <div class="intro color-1 d-lg-flex w-100 ftco-animate">
                      <div class="icon">
                          <span class="flaticon-cashback"></span>
                      </div>
                      <div class="text">
                          <h2>Money Back Guarantee</h2>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 d-flex">
                  <div class="intro color-2 d-lg-flex w-100 ftco-animate">
                      <div class="icon">
                          <span class="flaticon-free-delivery"></span>
                      </div>
                      <div class="text">
                          <h2>Free Shipping &amp; Return</h2>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  {{-- <section class="ftco-section ftco-no-pb">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('front/images/about.jpg') }});">
                  </div>
                  <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
            <div class="heading-section">
                <span class="subheading">Since 1905</span>
              <h2 class="mb-4">Desire Meets A New Taste</h2>

              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>
              <p class="year">
                  <strong class="number" data-number="115">0</strong>
                  <span>Years of Experience In Business</span>
              </p>
            </div>

                  </div>
              </div>
          </div>
    </section> --}}

      <section class="ftco-section ftco-no-pb">
          <div class="container">
              <div class="row">
                  @foreach ($categories as $category)
                    <div class="col-lg-2 col-md-4">
                        <a href="{{ route('category.index', $category->id) }}">
                            <div class="sort w-100 text-center ftco-animate">
                                <div class="img" style="background-image: url({{ asset('storage/categories/'.$category->image) }});"></div>
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </a>
                    </div>
                  @endforeach
              </div>
          </div>
      </section>



      <section class="ftco-section">
          <div class="container">
              <div class="row justify-content-center pb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">{{ __('index.Our Delightful offerings') }}</span>
          <h2>{{ __('index.Tastefully Yours') }}</h2>
        </div>
      </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 d-flex">
                        <div class="product ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image: url({{ asset('storage/products/'.$product->image) }});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" hidden>
                                        <a href="" productID="{{ $product->id }}" class="submitToCart d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                        <a href="" productID="{{ $product->id }}" class="submitToFav d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                        <a href="{{ route('products.show', $product->id) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="sale">Sale</span>
                                @if ( LaravelLocalization::getCurrentLocale() == 'en')
                                    <span class="category">{{ $product->category->name_en }}</span>
                                @else
                                    <span class="category">{{ $product->category->name_ar }}</span>
                                @endif
                                <h2>{{ $product->name }}</h2>
                                @if ( LaravelLocalization::getCurrentLocale() == 'en')
                                <p class="mb-0"><span class="price">LE {{ $product->price }}</span></p>
                                @else
                                <p class="mb-0"><span class="price"> {{ $product->price }} ????????</span></p>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="{{ route('products.index') }}" class="btn btn-primary d-block">{{ __('index.View All Products')  }}<span class="fa fa-long-arrow-right"></span></a>
                </div>
            </div>
        </div>
      </section>

  <section class="ftco-section testimony-section img" style="background-image: url({{ asset('front/images/bg_4.jpg') }});">
      <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <span class="subheading">Testimonial</span>
          <h2 class="mb-3">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url({{ asset('front/images/person_1.jpg') }})"></div>
                      <div class="pl-3">
                          <p class="name">Roger Scott</p>
                          <span class="position">Marketing Manager</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url({{ asset('front/images/person_2.jpg') }})"></div>
                      <div class="pl-3">
                          <p class="name">Roger Scott</p>
                          <span class="position">Marketing Manager</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url({{ asset('front/images/person_3.jpg') }})"></div>
                      <div class="pl-3">
                          <p class="name">Roger Scott</p>
                          <span class="position">Marketing Manager</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url({{ asset('front/images/person_1.jpg') }})"></div>
                      <div class="pl-3">
                          <p class="name">Roger Scott</p>
                          <span class="position">Marketing Manager</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url({{ asset('front/images/person_2.jpg') }})"></div>
                      <div class="pl-3">
                          <p class="name">Roger Scott</p>
                          <span class="position">Marketing Manager</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection
