<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Liquor Store - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- toaster link css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>

    @yield('style')
</head>
  <body>

    @include('front.inc.nav')

    @yield('content')

    @include('front.inc.footer')

  <script src="{{ asset('front/js/jquery.min.js') }}"></script>

    @yield('script')

  <script src="{{ asset('front/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('front/js/popper.min.js') }}"></script>
  <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('front/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  {{-- <script src="{{ asset('front/js/google-map.js') }}"></script> --}}
  <script src="{{ asset('front/js/main.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script> --}}



    <script>
        $(document).on('click', '.submitToCart', function(e){
            e.preventDefault();

            var productID = $(this).attr('productID');
            var quantity = $('#quantity').val();
            $.ajax({
                type: "get",
                url: "{{ route('addToCart') }}",
                data: {
                    'id' : productID,
                    'quantity' : quantity
                    },


                success: function (response) {
                    $(".itemsCount").html(response.totalQuantity);

                    $('#products-nav').html("");
                    $.each(response.products, function (index, value) {

                        $("#products-nav").append(`
                            <div class="dropdown-item d-flex align-items-start" href="#">
                                <div class="img" style="background-image: url(${value.attributes.image});"></div>
                                <div class="text pl-3">
                                    <h4>${value.name}</h4>
                                    <p class="mb-0"><a href="#" class="price">$${value.price}</a><span class="quantity ml-3">Quantity: ${value.quantity}</span></p>
                                </div>
                            </div>`
                        );
                    });

                    toastr.success(response.msg);
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    window.location.href = '/login';
                }

            });
        });
    </script>

    <script>
        $(document).ready(function(){

        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){
                e.preventDefault();
                var product_id = $(this).attr('product_id');
                var quantity = parseInt($('#quantity'+product_id).val());

                $('#quantity'+product_id).val(quantity + 1);

                $.ajax({
                    type: "get",
                    url: "{{ route('quantityPlus') }}",
                    data: {'id' : product_id},

                    success: function (response) {
                        if(response.status == true){
                            $("#total").text(response.total);
                            $(".priceSum"+response.id).text('$'+response.priceSum);
                            $(".itemsCount").html(response.totalQuantity);

                            $('#products-nav').html("");
                            $.each(response.products, function (index, value) {

                                $("#products-nav").append(`
                                    <div class="dropdown-item d-flex align-items-start" href="#">
                                        <div class="img" style="background-image: url(${value.attributes.image});"></div>
                                        <div class="text pl-3">
                                            <h4>${value.name}</h4>
                                            <p class="mb-0"><a href="#" class="price">$${value.price}</a><span class="quantity ml-3">Quantity: ${value.quantity}</span></p>
                                        </div>
                                    </div>`
                                );
                            });
                        }
                    }
                });


            });

            $('.quantity-left-minus').click(function(e){
                e.preventDefault();
                var product_id = $(this).attr('product_id');
                var quantity = parseInt($('#quantity'+product_id).val());
                if(quantity>1){
                $('#quantity'+product_id).val(quantity - 1);
                }

                $.ajax({
                    type: "get",
                    url: "{{ route('quantityMinus') }}",
                    data: {'id' : product_id},

                    success: function (response) {
                        if(response.status == true){
                            $("#total").text(response.total);
                            $(".priceSum"+response.id).text('$'+response.priceSum);
                            $(".itemsCount").html(response.totalQuantity);

                            $('#products-nav').html("");
                            $.each(response.products, function (index, value) {

                                $("#products-nav").append(`
                                    <div class="dropdown-item d-flex align-items-start" href="#">
                                        <div class="img" style="background-image: url(${value.attributes.image});"></div>
                                        <div class="text pl-3">
                                            <h4>${value.name}</h4>
                                            <p class="mb-0"><a href="#" class="price">$${value.price}</a><span class="quantity ml-3">Quantity: ${value.quantity}</span></p>
                                        </div>
                                    </div>`
                                );
                            });
                        }
                    }
                });


            });

        });
    </script>
    <script>
        $(document).on('click', '.deleteItemFromCart', function(e){
            e.preventDefault();

            var product_id = $(this).attr('product_id');

            $.ajax({
                type: "delete",
                url: "{{ route('deleteItemFromCart') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id'    : product_id
                },

                success: function (response) {
                    toastr.success(response.msg);
                    $("#total").text(response.total);
                    $(".itemsCount").html(response.totalQuantity);

                    $('#products-nav').html("");
                    $.each(response.products, function (index, value) {

                        $("#products-nav").append(`
                            <div class="dropdown-item d-flex align-items-start" href="#">
                                <div class="img" style="background-image: url(${value.attributes.image});"></div>
                                <div class="text pl-3">
                                    <h4>${value.name}</h4>
                                    <p class="mb-0"><a href="#" class="price">$${value.price}</a><span class="quantity ml-3">Quantity: ${value.quantity}</span></p>
                                </div>
                            </div>`
                        );
                    });
                }
            });

        })
    </script>


    <!--toaster js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



  </body>
  @toastr_render

</html>
