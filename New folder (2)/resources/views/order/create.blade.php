@extends('layout.index')

@section('title')
    Đặt hàng
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Sản phẩm
                    </div>
                    <div class="card-body">
                        @foreach ($carts as $cart)
                            <div class="_1cart">
                                <div class="d-flex">
                                    <img class="thumbnail img-responsive"
                                        src="{{ asset('storage/' . $cart->product->thumbnail) }}"
                                        alt="{{ $cart->product->thumbnail }}" class="thumbnail">
                                    <div class="infor">
                                        <a href="">
                                            <h6 class="title">{{ $cart->product->title }}</h6>
                                        </a>
                                        <div class="price">{{ $cart->quantity }} x
                                            {{ number_format($cart->product->price) }} VND</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        Thông tin nhận hàng
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.order.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nhập tên" value="{{ $user->first_name ?? ""}}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Họ và tên đệm</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nhập họ và tên đệm" value="{{ $user->last_name ?? ""}}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ $user->phone ?? ""}}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
