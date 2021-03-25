<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a>
                    <a href="#"><span class="fa fa-paper-plane mr-1"></span> youremail@email.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="social-media mr-4">
                <p class="mb-0 d-flex">
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                </p>
        </div>
        <div class="reg">
            @guest
            <p class="mb-0"><a href="{{ route('register') }}" class="mr-2">Sign Up</a> <a href="{{ route('login') }}">Log In</a></p>
            @else
            <a class="dropdown-item text-light mb-0" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">{{ __('nav.Shahd') }} <span>{{ __('nav.Al-Sham') }}</span></a>
    <div class="order-lg-last btn-group">
    <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="flaticon-shopping-bag"></span>
        <div class="d-flex justify-content-center align-items-center"><small class="itemsCount">{{  \Cart::session(Session::getId())->getTotalQuantity() }}</small></div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">

                <?php $products = \Cart::session(Session::getId())->getContent() ?>
                <div id="products-nav">
                    @foreach ($products as $product)
                    <div class="dropdown-item d-flex align-items-start" href="#">
                        <div class="img" style="background-image: url({{ $product->attributes->image }});"></div>
                        <div class="text pl-3">
                            <h4>{{ $product->name }}</h4>
                            <p class="mb-0"><a href="#" class="price">${{ $product->price }}</a><span class="quantity ml-3">Quantity: {{ $product->quantity }}</span></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="dropdown-item text-center btn-link d-block w-100" href="{{ route('cart.index') }}">
                    View All
                    <span class="ion-ios-arrow-round-forward"></span>
                </a>
            </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">{{ __('nav.Home') }}</a></li>
        <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">{{ __('nav.Products') }}</a></li>
        <li class="nav-item"><a href="about.html" class="nav-link">{{ __('nav.About') }}</a></li>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item">
            <a rel="alternate" class="nav-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
        </ul>
    </div>
    </div>
</nav>

