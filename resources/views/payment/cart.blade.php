@extends('layouts.app')

@section('style')
@endsection
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="url('/')">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">

                    @include('layouts.message')
                    
                    @if (!empty(Cart::content()->count()))
                        <div class="row">
                            <div class="col-lg-9">
                                <form action="{{ url('update_cart') }}" method="post">
                                    @csrf
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (Cart::content() as $key => $cart)
                                                @php
                                                    $getCartProduct = App\Models\Product::getSingle($cart->id);
                                                @endphp
                                                @if (!empty($getCartProduct))
                                                    @php
                                                        $getProductImage = $getCartProduct->getImageSingle(
                                                            $getCartProduct->id,
                                                        );
                                                    @endphp
                                                    <tr>
                                                        <td class="product-col">
                                                            <div class="product">
                                                                <figure class="product-media">
                                                                    <a href="#">
                                                                        <img src="{{ $getProductImage->getLogo() }}"
                                                                            alt="Product image">
                                                                    </a>
                                                                </figure>

                                                                <h3 class="product-title">
                                                                    <a
                                                                        href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a>
                                                                </h3><!-- End .product-title -->
                                                            </div><!-- End .product -->
                                                        </td>
                                                        <td class="price-col">${{ number_format($cart->price, 2) }}</td>
                                                        <td class="quantity-col">
                                                            <div class="cart-product-quantity">

                                                                <input type="number" name="cart[{{ $key }}][qty]"
                                                                    class="form-control" value="{{ $cart->qty }}"
                                                                    min="1" max="10" step="1"
                                                                    data-decimals="0" required>

                                                                <input type="hidden" class="form-control"
                                                                    name="cart[{{ $key }}][id]"
                                                                    value="{{ $cart->id }}">
                                                                <input type="hidden" class="form-control"
                                                                    name="cart[{{ $key }}][rowId]"
                                                                    value="{{ $cart->rowId }}">

                                                            </div><!-- End .cart-product-quantity -->
                                                        </td>
                                                        <td class="total-col">
                                                            ${{ number_format($cart->price * $cart->qty, 2) }}
                                                        </td>
                                                        <td class="remove-col">
                                                            <a href="{{ url('cart/delete/' . $cart->rowId) }}"
                                                                class="btn-remove"><i class="icon-close"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table><!-- End .table table-wishlist -->

                                    <div class="cart-bottom">

                                        <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                                class="icon-refresh"></i></button>
                                    </div><!-- End .cart-bottom -->
                                </form>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>${{ number_format(Cart::subtotal(), 2) }}</td>
                                            </tr><!-- End .summary-subtotal -->


                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{ number_format(Cart::subtotal(), 2) }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <a href="{{ url('checkout') }}"
                                        class="btn btn-outline-primary-2 btn-order btn-block">PROCEED
                                        TO
                                        CHECKOUT</a>
                                </div><!-- End .summary -->

                                <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                        SHOPPING</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    @else
                        <p>Cart is empty</p>
                    @endif
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('script')
@endsection
