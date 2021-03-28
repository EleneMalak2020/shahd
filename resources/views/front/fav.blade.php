@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
@endsection

@section('content')
@include('front.inc.mini-nav')
<section class="ftco-section">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="row" id="productsDiv">
                        @foreach ($products as $product)
                            <div class="col-md-3 d-flex">
                                <div class="product ftco-animate">
                                    <div class="img d-flex align-items-center justify-content-center"
                                        style="background-image: url({{ asset('storage/products/'.$product->image) }});">
                                        <div class="desc">
                                            <p class="meta-prod d-flex">
                                                <input type="text"  name="quantity" id="quantity" class="quantity form-control input-number" value="1" hidden>
                                                <a href="" productID="{{ $product->id }}" class="submitToCart d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                                <a href="{{ route('products.show', $product->id) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text text-center">
                                        @if ( LaravelLocalization::getCurrentLocale() == 'en')
                                            <span class="category">{{ $product->category->name_en }}</span>
                                        @else
                                            <span class="category">{{ $product->category->name_ar }}</span>
                                        @endif
                                        <h2>{{ $product->name }}</h2>
                                        @if ( LaravelLocalization::getCurrentLocale() == 'en')
                                            <p class="mb-0"><span class="price">LE {{ $product->price }}</span></p>
                                        @else
                                            <p class="mb-0"><span class="price"> {{ $product->price }} جنيه</span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- End Row -->
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div><!-- End Block -->
                        </div><!-- End col -->
                    </div><!-- End Row -->
                </div>

        </div> <!-- End Row -->
    </div> <!-- End container -->
</section>
@endsection

