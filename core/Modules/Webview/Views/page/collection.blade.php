@extends('Webview::layouts.app')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('pages.index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                @include('Webview::layouts.menu-shop')
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="{{ route('pages.product', $product->id) }}">
                                            <div class="pi-pic">
                                                @php
                                                    $image = explode(',', $product->images);
                                                @endphp
                                                <img src="image/product/{{ $image[0] }}" width="100px" height="auto;">
                                                @if($product->price_sale > 0)
                                                    <div class="sale">
                                                        Giảm giá
                                                    </div>
                                                @endif
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                            </div>
                                            <div class="pi-text">
                                                <div
                                                    class="catagory-name">{{ $product->category->name }} {{ $product->category->category->name }}</div>
                                                <h5>{{ $product->name }}</h5>
                                                <div class="product-price">
                                                    {{ number_format($product->price - $product->price_sale, 0) }}đ
                                                    @if($product->price_sale != 0)
                                                        <span>{{ number_format($product->price, 0) }}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="loading-more">
                        {{--                        <i class="icon_loading"></i>--}}
                        {{--                        <a href="#">--}}
                        {{--                            Loading More--}}
                        {{--                        </a>--}}
                        {{--                        {{ $products->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
