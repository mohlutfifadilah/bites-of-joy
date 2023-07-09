@extends('main.template.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
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
                                <li><a href="#">{{ ucwords($c->name_category) }}</a></li>
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
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>HOMEMADE</span>
                            <h2>Kue Kering <br />& Brownies</h2>
                            <p>Cita Rasa Autentik dalam Setiap Gigitan <br> Dari Kami untuk Anda</p>
                            <a href="#" class="primary-btn">BELANJA SEKARANG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($category as $c)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/' . $c->photo) }}">
                                <h5><a href="#">{{ $c->name_category }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Unggulan</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($category as $c)
                                <li data-filter="<?php echo '.' . preg_replace('/\s+/', '', $c->name_category); ?>">{{ $c->name_category }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($product as $p)
                    <?php
                    $nama = \App\Models\Category::where('id', $p->id_category)->first();
                    ?>
                    <div class="<?php echo 'col-lg-3 col-md-4 col-sm-6 mix ' . preg_replace('/\s+/', '', $nama->name_category); ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('img/product/upload/' . $p->photo) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $p->name_product }}</a></h6>
                                <h5>@currency($p->price)</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
@endsection
