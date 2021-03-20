@extends('layouts.master')
@section('content')
@include('front.inc.mini-nav')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="alert" role="alert">
                                <td>
                                    <label class="checkbox-wrap checkbox-primary">
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                </td>
                                <td>
                                    <div class="img" style="background-image: url({{ $product->attributes->image }});"></div>
                                </td>
                                <td>
                                    <div class="email">
                                        <span>{{ $product->name }}</span>
                                        <span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
                                    </div>
                                </td>
                                <td>${{ $product->price }}</td>
                                <td class="quantity " >
                                    <div class="input-group ">
                                        <span class="input-group-btn mr-2">
                                            <button type="button" class="quantity-left-minus btn" product_id="{{ $product->id }}"  data-type="minus" data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity{{ $product->id }}" name="quantity" class="quantity form-control input-number" value="{{ $product->quantity }}" min="1" max="100">
                                        <span class="input-group-btn ml-2">
                                            <button type="button" class="quantity-right-plus btn" product_id="{{ $product->id }}" data-type="plus" data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                                <td class="priceSum{{ $product->id }}">${{ $product->getPriceSum() }}</td>
                                <td>
                                    <button type="button" class="deleteItemFromCart close" product_id="{{ $product->id }}" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span id="total">${{ \Cart::session(Auth::id())->getTotal() }}</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>

@endsection

