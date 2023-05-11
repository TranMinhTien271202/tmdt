@extends('layout.app')
@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{ $data->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="product-main-1 no-arrow">
                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/1.jpg" id="img-1"
                                                        data-zoom-image="../assets/images/product/category/1.jpg"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/2.jpg"
                                                        data-zoom-image="../assets/images/product/category/2.jpg"
                                                        class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/3.jpg"
                                                        data-zoom-image="../assets/images/product/category/3.jpg"
                                                        class="img-fluid image_zoom_cls-2 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/4.jpg"
                                                        data-zoom-image="../assets/images/product/category/4.jpg"
                                                        class="img-fluid image_zoom_cls-3 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/5.jpg"
                                                        data-zoom-image="../assets/images/product/category/5.jpg"
                                                        class="img-fluid image_zoom_cls-4 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="../assets/images/product/category/6.jpg"
                                                        data-zoom-image="../assets/images/product/category/6.jpg"
                                                        class="img-fluid image_zoom_cls-5 blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bottom-slider-image left-slider no-arrow slick-top">
                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/1.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/2.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/3.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/4.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/5.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="../assets/images/product/category/6.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                <h2 class="name">{{ $data->name }}</h2>
                                <div class="price-rating">
                                    @if ($data->sale)
                                        <h3 class="theme-color price">{{ number_format($data->sale) }} <span class="price1"
                                                style="font-size: 11px;">VNĐ</span> <del
                                                class="text-content">{{ number_format($data->price) }} <span class="price1"
                                                    style="font-size: 11px;">Nghìn</span></del></h3>
                                    @else
                                        <h3 class="theme-color price">{{ number_format($data->price) }} <span class="price1"
                                                style="font-size: 11px;">VNĐ</span></h3>
                                    @endif
                                    <div class="product-rating custom-rate">
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
                                        <span class="review">23 Customer Review</span>
                                    </div>
                                </div>
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-right-plus" data-type="plus"
                                                data-field="" id="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" id="quantity" value="1">
                                            <button type="button" class="qty-left-minus" data-type="minus"
                                                data-field="" id="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button class="btn btn-md bg-dark cart-button text-white w-100" id="btn-cart">Add To
                                        Cart</button>
                                </div>

                                <div class="buy-box">
                                    <a href="wishlist.html">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a>
                                </div>

                                <div class="pickup-box">
                                    <div class="product-title">
                                        <h4>Thông tin chi tiết</h4>
                                    </div>
                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Thương hiệu : <a href="javascript:void(0)">{{ $data->brand->name }}</a>
                                            </li>
                                            <li>Loại sản phẩm : <a
                                                    href="javascript:void(0)">{{ $data->category->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Mô tả chi tiết</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Thông tin bổ xung</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab"
                                            aria-controls="review" aria-selected="false">Bình luận</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{!! $data->desc !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel"
                                        aria-labelledby="info-tab">
                                        <div class="table-responsive">
                                            <table class="table info-table">
                                                <tbody>
                                                    @foreach ($info as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <div class="row g-4">
                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Phản hồi của khách hàng</h4>
                                                    </div>
                                                    {{-- <div class="d-flex">
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
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h6 class="ms-3">4.2 Out Of 5</h6>
                                                    </div> --}}

                                                    {{-- <div class="rating-box">
                                                        <ul>
                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>5 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 68%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            68%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>4 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 67%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            67%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>3 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 42%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            42%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>2 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 30%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            30%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>1 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 24%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            24%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div> --}}
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Thêm bình luận</h4>
                                                    </div>

                                                    <div class="row g-4">
                                                        <form method="POST" name="cmt_form" id="cmt_form">
                                                            <div class="col-12">
                                                                <div class="form-floating theme-form-floating">
                                                                    <textarea class="form-control" placeholder="Nhập bình luận của bạn" name="comment" id="comment"
                                                                        style="height: 150px"></textarea>
                                                                    <input type="hidden" name="id" id="id"
                                                                        value="{{ $data->id }}">
                                                                    <label for="floatingTextarea2">Nhập bình luận của bạn
                                                                        tại
                                                                        đây</label>
                                                                    <br>
                                                                    <button
                                                                        class="btn btn-animation btn-sm mend-auto btn-cmt"
                                                                        id="btn-cmt">Bình
                                                                        luận</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Đánh giá của khách hàng</h4>
                                                    </div>
                                                    <div class="review-people">
                                                        <ul class="review-list comments" id="comments">
                                                            @foreach ($comment as $comment)
                                                                <li>
                                                                    <div class="people-box">
                                                                        <div>
                                                                            <div class="people-image"><img
                                                                                    src="../assets/images/review/1.jpg"class="img-fluid blur-up lazyload"
                                                                                    alt=""></div>
                                                                        </div>
                                                                        <div class="people-comment">
                                                                            <a class="name"
                                                                                href="javascript:void(0)">{{ $comment->user->name }}</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content">
                                                                                    {{ \Carbon\Carbon::parse($comment->created)->format('d/m/Y H:i:s') }}

                                                                            </div>
                                                                            <div class="reply">
                                                                                <p>{{ $comment->comment }}<a
                                                                                        href="javascript:void(0)">Reply</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
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
                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="verndor-contain">
                                <div class="vendor-image">
                                    <img src="../assets/images/product/vendor.png" class="blur-up lazyload"
                                        alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">{{ $data->user->name }}</h5>

                                    <div class="product-rating mt-1">
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
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>
                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            @if ($data->user->phone)
                                                <h5>Phone: <span class="text-content">{{ $data->user->phone }}</span></h5>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../assets/images/vegetable/product/23.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 70.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products</h2>
                <span class="title-leaf">
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-2.html">
                                            <img src="../assets/images/cake/product/11.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
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
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">Cake</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Chocolate Chip Cookies 250 g</h5>
                                        </a>
                                        <div class="product-rating mt-2">
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
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(5.0)</span>
                                        </div>
                                        <h6 class="unit">500 G</h6>
                                        <h5 class="price"><span class="theme-color">$10.25</span> <del>$12.57</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
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
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#plus').click(function() {
                var inputQuantity = $('#quantity');
                var quantity = parseInt(inputQuantity.val()) + 1;
                inputQuantity.val(quantity);
            });
            $('#minus').click(function() {
                var inputQuantity = $('#quantity');
                var count = parseInt(inputQuantity.val());
                if (count > 1) {
                    var quantity = parseInt(inputQuantity.val()) - 1;
                    inputQuantity.val(quantity);
                }
            });
        });
        $('#btn-cmt').click(function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var url = "{{ route('comment.store') }}";
            var product_id = $('#id').val();
            var cmt = $('#comment').val();
            console.log(url, cmt, product_id);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    cmt: cmt,
                    product_id: product_id,
                },
                success: function(data) {
                    console.log(data.comment);
                    if ($.isEmptyObject(data.message)) {
                        var comment = data.comment;
                        const createdAt = new Date(comment.created_at);
                        const formattedDate =
                            `${createdAt.toLocaleDateString()} ${createdAt.toLocaleTimeString()}`;
                        var html = `<li>`;
                        html += `<div class="people-box">`;
                        html +=
                            `<div><div class="people-image"><img src="../assets/images/review/1.jpg"class="img-fluid blur-up lazyload" alt=""></div></div>`;
                        html += `<div class="people-comment">`;
                        html += `<a class="name" href="javascript:void(0)">` + comment.user.name +
                            `</a>`;
                        html += `<div class="date-time">`;
                        html += `<h6 class="text-content">` + formattedDate + `</h6>`;
                        html += `</div>`;
                        html += `<div class="reply">`;
                        html += `<p>` + comment.comment + `<a href="javascript:void(0)">Reply</a></p>`;
                        html += `</div>`;
                        html += `</div>`;
                        html += `</div>`;
                        html += `</div>`;
                        html += `</li>`;
                        $('#comments').append(html);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            },
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        printErrorMsg(data.message);
                    }
                    // alert(data.success);

                }

            })
        });
        $('#btn-cart').click(function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var url = "{{ route('cart.store') }}";
            var product_id = $('#id').val();
            var quantity = $('#quantity').val();
            console.log(url, quantity, product_id);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    quantity: quantity,
                    product_id: product_id,
                },
                success: function(data) {
                    console.log(data);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        },
                    })
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    })
                }
            })
        });
    </script>
@endsection
