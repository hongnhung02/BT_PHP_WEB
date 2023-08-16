@extends('layout.index')

@section('title')
    Trang chủ
@endsection
@section('content')
<div class="container">
    <div class="my-4 pt-4 box-content" id="news">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>Sách mới cập nhật</h3>
                    <a href="">
                        <span>Xem tất cả</span>
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
                <div class="content">
                    @foreach ($news as $product)
                    <div class="_1content">
                        <img class="thumbnail" src="{{ asset("storage/$product->thumbnail") }}" alt="{{ $product->thumbnail }}">
                        <span class="category">{{ $product->category->title }}</span>
                        <a href="{{ route('product', [
                            'slug' => $product->slug
                        ]) }}" class="title">{{ $product->title }}</a>
                        <strong class="price">{{ number_format($product->price) }} VND</strong>
                        <div class="action">
                            <form action="{{ route('user.cart.store') }}" method="POST">
                                @csrf
                                <input type="number" hidden name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-secondary add-to-cart"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @foreach ($categories as $category)
    <div class="my-4 box-content" id="{{ $category->slug }}">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>{{ $category->title }}</h3>
                    <a href="{{ route('category') }}">
                        <span>Xem tất cả</span>
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
                <div class="content">
                    @foreach ($category->getProducts() as $product)
                    <div class="_1content">
                        <img class="thumbnail" src="{{ asset("storage/$product->thumbnail") }}" alt="{{ $product->thumbnail }}">
                        <span class="category">{{ $category->title }}</span>
                        <h6 class="title">{{ $product->title }}</h6>
                        <strong class="price">{{ number_format($product->price) }} VND</strong>
                        <div class="action">
                            <form action="{{ route('user.cart.store') }}" method="POST">
                                @csrf
                                <input type="number" hidden name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-secondary add-to-cart"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
