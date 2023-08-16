@extends('layout.index')

@section('title')
    Địa chỉ
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-3">
                <div class="list-group">
                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action text-center">
                        Tài khoản
                    </a>
                    <a href="{{ route('user.order.index') }}" class="list-group-item list-group-item-action text-center">Đơn hàng</a>
                    <a href="{{ route('user.address.index') }}" class="list-group-item list-group-item-action text-center active">Địa chỉ</a>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        Địa chỉ
                    </div>
                    {{-- <div class="card-body">
                        <form action="{{ route('profile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="email" class="form-label">Địa chỉ Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email" value="{{ $user->email ?? ""}}">
                            </div>
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

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
