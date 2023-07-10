@extends('main.template.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Semua Kategori</span>
                        </div>
                        <ul>
                            @foreach ($category as $c)
                                <li><a href="#">{{ $c->name_category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Apa yang kamu butuhkan?">
                                <button type="submit" class="site-btn">Cari</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>08986039011</h5>
                                <span>Melayani 24 jam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = [];
                                ?>
                                @foreach ($product as $p)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset('img/product/upload/' . $p->photo) }}" alt="">
                                            <h5>{{ $p->name_product }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            @currency($p->price)
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            @currency($p->price * 1)
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span><i class="fas fa-times"></i></span>
                                        </td>
                                    </tr>
                                    <?php
                                    array_push($total, $p->price * 1);
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Lanjut Belanja</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span><i
                                    class="fas fa-spinner"></i></span>
                            Update Keranjang</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total Keranjang</h5>
                        <ul>
                            <li>Subtotal <span>@currency(array_sum($total))</span></li>
                            <li>Total <span>@currency(array_sum($total))</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
