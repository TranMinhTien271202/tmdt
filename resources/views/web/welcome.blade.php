@extends('layout.app')
@section('content')
    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Home Section Start -->
    <section class="home-section-2 home-section-bg pt-0 overflow-hidden">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="slider-animate">
                        <div>
                            <div class="home-contain rounded-0 p-0">
                                <img src="../assets/images/fashion/home-banner/1.jpg"
                                    class="img-fluid bg-img blur-up lazyload" alt="">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded text-uppercase text-danger">Ưu đãi cuối tuần
                                            </h6>
                                            <h1 class="heding-2">Chất lượng cao</h1>
                                            <h5 class="text-content">Các mẫu hot & Trending có sẵn ở đây !
                                            </h5>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Mua
                                                ngay <i data-feather="shopping-cart"></i></button>
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
    <!-- Home Section End -->

    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/t-shirt.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.05s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jeans.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Quần</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.1s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/cords.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Váy</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.15s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jacket.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo Khoác</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.2s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/blzer.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo Vest</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.25s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/shapewear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Đồ Bơi</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.3s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/sleepwear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo Choàng</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.35s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/swimwear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Bikini</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Deal Section Start -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Các mặt hàng bán chạy</h2>
            </div>
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-12 ratio_110">
                    <div class="slider-6 img-slider">
                        <div>
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/fashion/product/1.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">brown khadi jacket</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Section End -->


    <!-- banner section start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row g-md-4 g-3">
                <div class="col-xxl-8 col-xl-12 col-md-7">
                    <div class="banner-contain hover-effect">
                        <img src="../assets/images/fashion/banner/1.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4">
                            <div>
                                <h2 class="text-kaushan fw-normal theme-color">Bạn đã sẵn sàng để</h2>
                                <h3 class="mt-2 mb-3">Lấy ngay hôm nay!</h3>
                                <p class="text-content banner-text">Trong xuất bản và thiết kế đồ họa, Lorem ipsum là
                                    một văn bản giữ chỗ thường được sử dụng để minh họa..</p>
                                <button onclick="location.href = 'shop-left-sidebar.html';"
                                    class="btn btn-animation btn-sm mend-auto">Mua ngay <i
                                        data-feather="shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12 col-md-5">
                    <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100">
                        <img src="../assets/images/fashion/banner/2.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4 h-100">
                            <div>
                                <h2 class="text-kaushan fw-normal text-danger">Giảm giá 20%</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->


    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 d-lg-block d-none">
                    <div class="ratio_156">
                        <div class="banner-contain-2 hover-effect">
                            <img src="../assets/images/fashion/banner/3.jpg" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="banner-detail-2 p-bottom-center text-center home-p-medium">
                                <div>
                                    <h2 class="text-qwitcher">Đam mê</h2>
                                    <h3>Hoàn thiện</h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';" class="btn btn-md">Mua
                                        ngay <i data-feather="shopping-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="slider-3_3 product-wrapper">
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Bán chạy nhất </h3>
                                        </div>

                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="product-left-thumbnail.html" class="top-selling-image">
                                                <img src="../assets/images/fashion/product/1.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h5>Tuffets Whole Wheat Bread</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Các sản phẩm thịnh hành</h3>
                                        </div>
                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="product-left-thumbnail.html" class="top-selling-image">
                                                <img src="../assets/images/fashion/product/5.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h5>Good Life Refined Sunflower Oil</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Các sản phẩm mới</h3>
                                        </div>

                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="product-left-thumbnail.html" class="top-selling-image">
                                                <img src="../assets/images/fashion/product/9.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h5>Tuffets Britannia Cheezza</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
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
    <section class="newsletter-section section-b-space">
    </section>
@endsection
