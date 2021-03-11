@extends('Webview::layouts.app')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('pages.index') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('pages.shop') }}">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-section spad">
        <div class="container">
            <form action="{{ route('checkout') }}" class="checkout-form" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <form action="">
                        <div class="col-lg-6">
                            <h4>Biiling Details</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="fir">Name<span>*</span></label>
                                    <input type="text" name="name" value="{{ $user->name }}" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="email" name="email" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" name="phone" value="">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Address<span>*</span></label>
                                    <input type="text" name="address" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="place-order">
                                <h4>Your Order</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Product <span>Total</span></li>
                                        @foreach (Cart::content() as $item)
                                            <li class="fw-normal">{{ $item->name }} x {{ $item->qty }} <span>{{ number_format($item->price * $item->qty, 0) }}đ</span>
                                            </li>
                                        @endforeach
                                        <li class="total-price">Total <span>{{ Cart::Subtotal($decimals = 0) }}₫</span>
                                        </li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Cheque Payment
                                                <input type="radio" id="pc-check" name="check" value="payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Paypal
                                                <input type="radio" id="pc-paypal" name="check" value="paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </section>

@endsection
