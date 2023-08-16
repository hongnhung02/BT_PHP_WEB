@extends('layout.index')

@section('title')
    Đăng ký
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="register">
                    <form accept="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nhập tên">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Họ và tên đệm</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nhập họ và tên đệm">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
