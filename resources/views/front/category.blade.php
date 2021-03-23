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
                    <div class="row mb-4">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h4 class="product-select">Select Types of Products</h4>
                            <div class="dropdown">
                                <a class="btn btn-warning btn-lg dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Chose Category
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach ($categories as $category)
                                        <a class="dropdown-item {{ $category->id == request()->route('category_id') ? 'active' : ''}}" href="{{ route('category.index', $category->id) }}">{{ $category->name_en }}</a>
                                    @endforeach
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('products.index') }}">All Products</a>
                                </div>
                              </div>
                            {{-- <select class="selectpicker filter-select" id="categoryID" name="category" multiple>
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="row" id="productsDiv">
                        @foreach ($products as $product)
                            <div class="col-md-3 d-flex">
                                <div class="product ftco-animate">
                                    <div class="img d-flex align-items-center justify-content-center"
                                        style="background-image: url({{ asset('storage/products/'.$product->image) }});">
                                        <div class="desc">
                                            <p class="meta-prod d-flex">
                                                <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" hidden>
                                                <a href="" productID="{{ $product->id }}" class="submitToCart d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                                <a href="{{ route('products.show', $product->id) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text text-center">
                                        <span class="sale">Sale</span>
                                        <span class="category">{{ $product->category->name_en }}</span>
                                        <h2>{{ $product->name_en }}</h2>
                                        <p class="mb-0"><span class="price price-sale">$69.00</span> <span class="price">${{ $product->price }}</span></p>
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

