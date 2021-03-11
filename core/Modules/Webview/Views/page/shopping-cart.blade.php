@extends('Webview::layouts.app')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('pages.index') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('pages.shop') }}">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Size</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img src="image/product/{{ $item->options->image }}"
                                                                        alt="">
                                    </td>
                                    <td class="p-price first-row">
                                            {{ $item->name }}
                                            <input type="hidden" value="{{ $item->rowId }}" class="row-id">
                                    </td>
                                    <td class="p-price first-row">{{ number_format($item->price, 0) }}đ</td>
                                    <td class="p-price first-row">{{ $item->options->size }}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $item->qty }}" class="qty">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{ number_format($item->price * $item->qty, 0) }}
                                        đ
                                    </td>
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post"
                                          class="form-remove">
                                        {{ csrf_field() }}
                                        <td class="close-td first-row">
                                            <i class="ti-close remove"></i>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{ route('pages.shop') }}" class="primary-btn continue-shop">Continue
                                    shopping</a>
                                <a href="#" id="update-cart" class="primary-btn up-cart">Update cart</a>
                            </div>
{{--                            <div class="discount-coupon">--}}
{{--                                <h6>Discount Codes</h6>--}}
{{--                                <form action="#" class="coupon-form">--}}
{{--                                    <input type="text" placeholder="Enter your codes">--}}
{{--                                    <button type="submit" class="site-btn coupon-btn">Apply</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Total <span>{{ Cart::Subtotal($decimals = 0) }}₫</span></li>
                                </ul>
                                @if(Auth::check())
                                    <a href="{{ route('pages.checkout', Auth::user()->id) }}" class="proceed-btn">PROCEED
                                        TO CHECK OUT</a>
                                @else
                                    <a href="{{ route('pages.login') }}" class="proceed-btn">PROCEED
                                        TO CHECK OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{--    <script>--}}
    {{--        $('#update-cart').on('click', function (e) {--}}
    {{--            e.preventDefault();--}}
    {{--            $.ajaxSetup({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                }--}}
    {{--            });--}}
    {{--            var data = [];--}}
    {{--            $('.tbody').find('tr').each(function () {--}}
    {{--                var arr = [];--}}
    {{--                var _self = $(this);--}}
    {{--                arr['rowId'] = _self.find('.row-id').val();--}}
    {{--                arr['qty'] = _self.find('.qty').val();--}}
    {{--                data.push(arr);--}}
    {{--            });--}}
    {{--            console.log(data)--}}
    {{--            $.ajax({--}}
    {{--                url: "{{ route('cart.update') }}",--}}
    {{--                type: 'post',--}}
    {{--                data: {--}}
    {{--                    data: data,--}}
    {{--                }--}}
    {{--            })--}}
    {{--                .done(function (data) {--}}
    {{--                    console.log(data);--}}
    {{--                })--}}
    {{--                .fail(function () {--}}
    {{--                    console.log("error");--}}
    {{--                })--}}
    {{--                .always(function () {--}}
    {{--                    //--}}
    {{--                });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
