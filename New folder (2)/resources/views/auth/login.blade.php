@extends('layout.index')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="register">
                    <form accept="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a href="{{ route('auth.register') }}">Đăng ký tài khoản?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
