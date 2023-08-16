@extends('layout.index')

@section('title')
    Đơn hàng
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-3">
                <div class="list-group">
                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action text-center">
                        Tài khoản
                    </a>
                    <a href="{{ route('user.order.index') }}" class="list-group-item list-group-item-action text-center active">Đơn hàng</a>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        Đơn hàng
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Ngày đặt hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng giá trị</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Ngày đặt hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng giá trị</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->total_price() }} VND</td>
                                        <td>Đang xử lý</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
