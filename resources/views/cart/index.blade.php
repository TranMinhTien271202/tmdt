@extends('layout.app')
@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="product-left-thumbnail.html" class="product-image">
                                                        <img src="../assets/images/vegetable/product/1.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a
                                                                    href="product-left-thumbnail.html">{{ $item->product->name }}</a>
                                                            </li>

                                                            <li class="text-content"><span class="text-title">Bán bởi:
                                                                </span>{{ $item->user->name }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price">
                                                @if ($item->product->sale)
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <h5>{{ number_format($item->product->sale) }}<del
                                                            class="text-content">{{ number_format($item->product->price) }}</del></h5>
                                                @else
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <h5>{{ number_format($item->product->price) }}</h5>
                                                @endif
                                            </td>

                                            <td class="quantity">
                                                <h4 class="table-title text-content">Qty</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input"
                                                                type="text" name="quantity"
                                                                value="{{ $item->quantity }}">
                                                            <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Total</h4>
                                                @if ($item->product->sale)
                                                    <h5>{{ number_format($item->quantity * $item->product->sale) }} </h5>
                                                @else
                                                    <h5>{{ number_format($item->quantity * $item->product->price) }} </h5>
                                                @endif
                                            </td>

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                                <a class="remove close_button" href="javascript:void(0)">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Tổng giá</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Áp dụng mã giảm giá</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Áp dụng mã giảm giá">
                                    <button class="btn-apply">Áp dụng</button>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Tổng giá</h4>
                                    <h4 class="price">$125.65</h4>
                                </li>

                                <li>
                                    <h4>Mã giảm giá</h4>
                                    <h4 class="price">(-) 0.00</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Phí giao hàng</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4 >Tổng giá (<span style="font-size: 10px">Nghìn đồng</span>)</h4>
                                <h4 class="price theme-color">$132.58</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = 'checkout.html';"
                                        class="btn btn-animation proceed-btn fw-bold">Thanh toán</button>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Tiếp tục mua sắm</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
