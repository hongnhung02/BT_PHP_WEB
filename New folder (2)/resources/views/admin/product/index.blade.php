@extends('admin.layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá sản phẩm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá sản phẩm</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category ? $product->category->title : '' }}</td>
                            <td>{{ number_format($product->price) }} VNĐ</td>
                            <td>
                                <a href="{{ route('admin.product.edit', [
                                    'product' => $product
                                ]) }}" class="btn btn-primary float-left mr-2">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form class="float-left" action="{{ route('admin.product.destroy', [
                                    'product' => $product
                                ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
