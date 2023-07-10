<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bites of Joy</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="#"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-5">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ $active == 'home' ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="{{ $active == 'shop-grid' ? 'active' : '' }}">
                            <a href="{{ url('/shop-grid') }}">Shop</a>
                        </li>
                        <li
                            class="{{ $active == 'checkout' ? 'active' : ($active == 'shop-detail' ? 'active' : ($active == 'shop-cart' ? 'active' : '')) }}">
                            <a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li class="{{ $active == 'shop-detail' ? 'active' : '' }}">
                                    <a href="{{ url('/shop-detail') }}">Shop Details</a>
                                </li>
                                <li class="{{ $active == 'shop-cart' ? 'active' : '' }}"><a
                                        href="{{ url('/shop-cart') }}">Shoping Cart</a></li>
                                <li class="{{ $active == 'checkout' ? 'active' : '' }}">
                                    <a href="{{ url('/checkout') }}">
                                        Check Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ $active == 'contact' ? 'active' : '' }}"><a
                                href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 ml-auto mr-0">
                <div class="header__cart mr-0">
                    <ul class="mr-0">
                        <li><a href="#"><i class="fas fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fas fa-shopping-bag"></i> <span>3</span></a></li>
                        <div class="header__cart__price">Total: <span>Rp 75.000</span></div>
                        <a href="/login" class="primary-btn"><span>Login</span></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
