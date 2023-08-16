@extends('layout.index')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Giỏ hàng
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
                                <form action="{{ route('user.cart.destroy', [
                                    'cart' => $cart
                                ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>

                            </div>
                        @endforeach

                        <div class="d-grid">
                            <a href="{{ route('user.order.create') }}" class="btn btn-primary">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
