@extends('layouts.master')
@section('content')
@include('front.inc.mini-nav')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <form action="{{ route('order.store') }}" method="POST" class="billing-form">
                    @csrf
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Firt Name</label>
                            <input type="text" name="name" class="form-control" placeholder="" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">State / Country</label>
                                <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="aria" class="selectAria form-control">
                                        <option value="">--Chose Your Aria--</option>
                                        @foreach ($arias as $aria)
                                            <option value="{{ $aria->id }}">{{ $aria->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="streetaddress">Street Address</label>
                            <input type="text" name="address" class="form-control" placeholder="House number and street name" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="" value="{{ $user->phone }}">
                        </div>
                    </div>


                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>${{ \Cart::session(Auth::id())->getTotal() }}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span class="delivery_cost">$0.00</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span class="total">${{ \Cart::session(Auth::id())->getTotal() }}</span>
                                </p>
                                <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                            </div>
                        </div>
                    </div>
                </form>

            </div> <!-- .col-md-8 -->
        </div><!--End Row-->
    </div>
</section>


@endsection


@section('script')
<script>
    $(document).on('change', '.selectAria', function(e){
        e.preventDefault();
        var aria_id = $('.selectAria option:selected').val();
        $.ajax({
            type: "get",
            url: "{{ route('choseAria') }}",
            data: {'id' : aria_id},
            contentType: false,
            cache: false,

            success: function (response) {
                $('.delivery_cost').text('$'+response.data);
                $('.total').text('$'+(parseInt(response.data) + parseInt(response.subtotal)));

            },

        });
    });
</script>
@endsection
