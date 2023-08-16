@extends('layout.index')

@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <div class="container">
        <div class="my-4 box-content">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h3>{{ $product->title }}</h3>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('category') }}">{{ $product->category->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="product-detail">
                        <div class="row">
                            <div class="col-4">
                                <div class="images">
                                    <img class="img-responsive" src="{{ asset("storage/$product->thumbnail") }}" alt="">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="info">
                                    <h2>{{ $product->title }}</h2>
                                    <h3><strong>{{ number_format($product->price) }} VNĐ</strong></h3>
                                    <button class="btn btn-primary">Thêm giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                {!! $product->description ?? "" !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
